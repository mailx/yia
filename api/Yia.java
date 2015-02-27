import java.util.*;
import java.util.Map.*;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.URL;
import java.net.URLConnection;
import sun.misc.*; 
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import org.json.*;

class Yia{
	private static String pid = "123";
	private static String secret = "yia";
	public String url;
	public String method;
	public HashMap params;

	public String head;
	public String body;
	public String requestJson;
	public String responseJson;

    public Oai(String url, String method, HashMap params){
		this.url = url;
		this.method = method;
		this.params = params;
		this.buildRequestJson();
    }

	private String buildRequestJson(){
		this.setBody();
		System.out.println("body--"+this.body+"\n");
		this.setHead();
		System.out.println("head--"+this.head+"\n");
		this.setRequestJson();
		System.out.println("requestJson--"+this.requestJson+"\n");
		return null;
	}

	private String setHead(){
		String time = String.valueOf(System.currentTimeMillis()/1000);
		//String time = "1423805031";
		String sign = md5( this.body + time + this.secret);
		//System.out.println(sign);
		return this.head = "\"pid\":" + this.pid + ",\"time\":"+ '"' + time + '"' + ",\"sign\":" + '"' + sign + '"' + ",\"method\":" +  '"'  + this.method + '"';
	}

	private String setBody(){
		Iterator it = this.params.entrySet().iterator(); 
		String bodyStr = "";
		while(it.hasNext()){
			Entry obj = (Entry) it.next(); 
			bodyStr = bodyStr == "" ? "" : ",";
			bodyStr = '"' + (String)obj.getKey() + '"' + ":" + '"' +  (String)obj.getValue() + '"' ;
			bodyStr = "{" +bodyStr + "}";
		}
		return this.body = (new BASE64Encoder()).encode( bodyStr.getBytes() );
	}

	private String setRequestJson(){
		return this.requestJson = "{\"head\":{" +this.head+ "},\"body\": \""+ this.body +"\"}";
	}

	private String md5(String plainText) {
        String re_md5 = new String();
        try {
            MessageDigest md = MessageDigest.getInstance("MD5");
            md.update(plainText.getBytes());
            byte b[] = md.digest();
 
            int i;
 
            StringBuffer buf = new StringBuffer("");
            for (int offset = 0; offset < b.length; offset++) {
                i = b[offset];
                if (i < 0)
                    i += 256;
                if (i < 16)
                    buf.append("0");
                buf.append(Integer.toHexString(i));
            }
 
            re_md5 = buf.toString();
 
        } catch (NoSuchAlgorithmException e) {
            e.printStackTrace();
        }
        return re_md5;
    }

	//����post����
	public String sendRequest() {
        PrintWriter out = null;
        BufferedReader in = null;
        String result = "";
        try {
            URL realUrl = new URL(this.url);

            URLConnection conn = realUrl.openConnection();

            conn.setRequestProperty("accept", "*/*");
            conn.setRequestProperty("connection", "Keep-Alive");
            conn.setRequestProperty("user-agent",
                    "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1;SV1)");

            conn.setDoOutput(true);
            conn.setDoInput(true);

            out = new PrintWriter(conn.getOutputStream());

            out.print("request=" + this.requestJson);

            out.flush();

            in = new BufferedReader(
                    new InputStreamReader(conn.getInputStream()));
            String line;
            while ((line = in.readLine()) != null) {
                result += line;
            }
        } catch (Exception e) {
			System.out.println(e);
			e.printStackTrace();
        }

        finally{
            try{
                if(out!=null){
                    out.close();
                }
                if(in!=null){
                    in.close();
                }
            }
            catch(IOException ex){
                ex.printStackTrace();
            }
        }
		this.responseJson = result;
		System.out.println("result--" + result + "\n");
        return result;
    }    

	public JSONObject getResponse(){
		try{
			JSONObject responseObj = new JSONObject(this.responseJson);
			JSONObject headObj= responseObj.getJSONObject("head");
			String bodyStr= responseObj.getString("body");
			System.out.println("head--" + head + "\n");
			System.out.println("body--" + bodyStr + "\n");
			byte[] b =  (new BASE64Decoder()).decodeBuffer( bodyStr );
			bodyStr = new String(b);
			System.out.println("body--base64decoded--" + bodyStr + "\n");
			JSONObject bodyObj = new JSONObject(bodyStr);
			return bodyObj;

		}catch(Exception e){
			e.printStackTrace();
		}

		return null;
	}

}
