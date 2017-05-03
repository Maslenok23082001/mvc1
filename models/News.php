<?php
class News {
    private function getConnect () {
        return include_once (ROOT."/components/DB.php");
    }
    public static function getNewsList () {
        $bd=News::getConnect();
        $result = $bd->query("SELECT * FROM `posts` ORDER BY `post_id` DESC");
        if ($result) {
            $i=0;
            $newsItems = array();
            while ($row = $result->fetch_assoc()) {
                $newsItems[$i]['id'] = $row['post_id'];
                $newsItems[$i]['title'] = $row['post_title'];
                $newsItems[$i]['text'] = $row['post_text'];
                $i++;
            }

            return $newsItems;
        }
    }
    public static function getNewsById ($id) {
        $bd=News::getConnect();
        $result = $bd->query("SELECT * FROM `posts` WHERE `post_id`=".$id);
        return $result->fetch_assoc();
    }
};