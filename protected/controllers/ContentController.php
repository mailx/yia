<?php
/**
 * @author mraz <tonymark0714@gmail.com>
 */
class ContentController extends RPCController {

    public function actionGetContentList($request) {
        $handler = new GetContentListHandler($request);
        $handler->run();
        return $handler->getResponse_obj();
    }

}
