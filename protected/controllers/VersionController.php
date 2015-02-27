<?php
/**
 * @author mraz <tonymark0714@gmail.com>
 */
class VersionController extends RPCController {

    public function actionCheckAndroidVersion($request) {
        $handler = new CheckAndroidVersionHandler($request);
        $handler->run();
        return $handler->getResponse_obj();
    }

}
