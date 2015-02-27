import java.util.HashMap;
import org.json.*;

public class test{
	public static void main(String[] args){
		String url = "http://localhost/yia/index.php/course";
		String method ="GetCourseDetail";
		HashMap params = new HashMap();
		params.put("courseid","1123");

		Yia yia = new Oai(url,method,params);
		yia.sendRequest();
		JSONObject response = yia.getResponse();
		try{
			System.out.println( response.getString("id") );
			System.out.println( response.getString("name") );
		}catch(Exception e){
			e.printStackTrace();
		}
	}
}