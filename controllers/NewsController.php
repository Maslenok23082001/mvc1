<?php
include_once ROOT."/models/News.php";
class NewsController {
    public function actionList () {
        $newsItems = News::getNewsList();
        if ($newsItems) {
            include_once(ROOT."/views/index.php");
        }
        return true;
    }
    public function actionItem_news ($parameters) {
        $newsItem = News::getNewsById($parameters[0]);
        if ($newsItem) {
            include_once(ROOT."/views/view.php");
        }
        else {
            include_once(ROOT."/views/404_not_found.php");
        }
        return true;
    }
};