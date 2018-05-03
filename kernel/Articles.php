<?php
require_once 'Img.php';

class Articles extends Img
{
    public $id;
    public $title;
    public $description;

    public $url;
    public $imgCollectionId;
    public $incomplete;
    public $text;
    public $img;
    public $author;

    protected function sqlCheck()
    {
        $find = ["\n", "\"", '--',];
        $replase = ["\\n", "\\\"", '',];
        $this->title = str_replace($find, $replase, $this->title);
        $this->description = str_replace($find, $replase, $this->description);
        $this->incomplete = str_replace($find, $replase, $this->incomplete);
        $this->text = str_replace($find, $replase, $this->text);
        $this->url = str_replace($find, $replase, $this->url);
        $this->author = str_replace($find, $replase, $this->author);
    }

    protected function video($text,$trigger = true){
        if(strpos($text, '<youtube>')!== false){
            $result = explode('<youtube>',$text)[1];
            $find = '<youtube>'.$result.'<youtube>';
            $data = explode('#',$result);
            if($trigger){
                $replace = '<iframe width="'.$data[0].'" height="'.$data[1].'" src="https://www.youtube.com/embed/'.$data[2].'?rel=0&amp;amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
            }else{
                $replace = '
                <a class="card-video centered" href="https://www.youtube.com/watch?v='.$data[2].'">
                  <div class="card-inner">
                    <div class="card-content">
                      <amp-youtube
                          data-videoid="'.$data[2].'"
                          layout="responsive"
                          width="'.$data[0].'" height="'.$data[1].'"></amp-youtube>
                    </div>
                  </div>
                </a>
                ';
            }
            $text = str_replace($find,$replace,$text);
        }
        return $text;
    }

    public function showArticleAmp()
    {
        $result = $this->video($this->text,false);
        $find = ['<h2>', '</h2>','<a ','$tab$',
            ];

        $replase = ['<h2 class="text-center">', '</h2>','<a class="ul-w-price-button ul-w-button1 middle" ','&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
           ];

        $index = 4;
        $this->imgCollectionId = $this->url;

        if ($this->imgCollectionId != '0') {

            $this->imgCollect = $this->imgCollectionId;
            $collections = $this->selectCollection();

            if ($collections) {
                while ($collection = mysqli_fetch_array($collections, MYSQLI_NUM)) {

                    $find[$index] = 'img_' . str_replace('../articlesImg/' . $this->url . '/', '', $collection[2]) . ':cen';
                    $replase[$index] = '</p><amp-img noloading
                                     height="360"
                                     width="450"
                                     layout=fixed src="https://www.islandgift.ru' . str_replace('..', '', $collection[2]) . '" class="img-responsive" alt="' . $this->title . '" title="' . $this->title . '"></amp-img><p>';
                    $index++;

                    $find[$index] = 'img_' . str_replace('../articlesImg/' . $this->url . '/', '', $collection[2]) . ':left';
                    $replase[$index] = '</p><amp-img noloading
                                     height="360"
                                     width="450"
                                     layout=fixed 
                                     src="https://www.islandgift.ru' . str_replace('..', '', $collection[2]) . '" class="img-responsive pull-left width-40-pct"  alt="' . $this->title . '" title="' . $this->title . '"></amp-img><p>';
                    $index++;

                    $find[$index] = 'img_' . str_replace('../articlesImg/' . $this->url . '/', '', $collection[2]) . ':right';
                    $replase[$index] = '</p><amp-img noloading
                                     height="360"
                                     width="450"
                                     layout=fixed src="https://www.islandgift.ru' . str_replace('..', '', $collection[2]) . '" class="img-responsive pull-right width-40-pct"   alt="' . $this->title . '" title="' . $this->title . '"></amp-img><p>';
                    $index++;

                }
                mysqli_free_result($collections);
            }

        }

        $find[$index] = 'img_index:cen';
        $replase[$index] = '</p><amp-img noloading
                                     height="360"
                                     width="450"
                                     layout=fixed src="https://www.islandgift.ru' . str_replace('..', '', $this->img) . '" class="img-responsive" alt="' . $this->title . '" title="' . $this->title . '"></amp-img><p>';
        $index++;

        $find[$index] = 'img_index:left';
        $replase[$index] = '</p><amp-img noloading
                                     height="360"
                                     width="450"
                                     layout=fixed 
                                     src="https://www.islandgift.ru' . str_replace('..', '', $this->img) . '" class="img-responsive pull-left width-40-pct"  alt="' . $this->title . '" title="' . $this->title . '"></amp-img><p>';
        $index++;

        $find[$index] = 'img_index:right';
        $replase[$index] = '</p><amp-img noloading
                                     height="360"
                                     width="450"
                                     layout=fixed src="https://www.islandgift.ru' . str_replace('..', '', $this->img) . '" class="img-responsive pull-right width-40-pct"   alt="' . $this->title . '" title="' . $this->title . '"></amp-img><p>';
        $index++;

        $result = str_replace($find, $replase, $result);

        $result = '<div class="col ul-col col-xs-12 col-sm-12 col-md-12"><p>'
           /* . '<amp-img 
                noloading
                height="280"
                width="450"
                layout=fixed
                                     src="https://www.islandgift.ru' . str_replace('..', '', $this->img) . '" title="' . $this->title . '" alt="' . $this->title . '"></amp-img></p><p>'
            */. $result . '</p></div>';

        return $result;
    }

    public function showArticleRss()
    {
        $result = $this->video($this->text);
        $find = ['<h2>', '</h2>','$tab$'];

        $replase = ['<h2><b>', '</b></h2>',''];

        $index = 3;
        $this->imgCollectionId = $this->url;

        if ($this->imgCollectionId != '0') {

            $this->imgCollect = $this->imgCollectionId;
            $collections = $this->selectCollection();

            if ($collections) {
                while ($collection = mysqli_fetch_array($collections, MYSQLI_NUM)) {

                    $find[$index] = 'img_' . str_replace('../articlesImg/' . $this->url . '/', '', $collection[2]) . ':cen';
                    $replase[$index] = '<img src="' . $collection[2] . '" />';
                    $index++;

                    $find[$index] = 'img_' . str_replace('../articlesImg/' . $this->url . '/', '', $collection[2]) . ':left';
                    $replase[$index] = '<img src="' . $collection[2] . '" />';
                    $index++;

                    $find[$index] = 'img_' . str_replace('../articlesImg/' . $this->url . '/', '', $collection[2]) . ':right';
                    $replase[$index] = '<img src="' . $collection[2] . '" />';
                    $index++;

                }
                mysqli_free_result($collections);
            }

        }

        $find[$index] = 'img_index:cen';
        $replase[$index] = '<img src="' . $this->img . '" />';
        $index++;

        $find[$index] = 'img_index:left';
        $replase[$index] = '<img src="' . $this->img . '" />';
        $index++;

        $find[$index] = 'img_index:right';
        $replase[$index] = '<img src="' . $this->img . '" />';
        $index++;

        $result = str_replace($find, $replase, $result);

        $result = '<p>'
            . '<figure><img src="' . $this->img . '" /><figcaption>' . $this->title . '</figcaption></figure></p><p>'
            . $result . '</p><p>Автор статьи: ' . $this->author . '</p>';

        return $result;
    }

    public function showArticle()
    {
        $result = $this->video($this->text);
        $find = ['<h2>', '</h2>', '<a','$tab$'];

        $replase = ['<h2><span class="text-align:center">', '</span></h2>','<a class="ul-w-price-button ul-w-button1 middle"','&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'];

        $index = 4;
        $this->imgCollectionId = $this->url;

        if ($this->imgCollectionId != '0') {

            $this->imgCollect = $this->imgCollectionId;
            $collections = $this->selectCollection();

            if ($collections) {
                while ($collection = mysqli_fetch_array($collections, MYSQLI_NUM)) {

                    $find[$index] = 'img_' . str_replace('../articlesImg/' . $this->url . '/', '', $collection[2]) . ':cen';
                    $replase[$index] = '<img src="' . $collection[2] . '" class="img-responsive imgZoom" style="width:100%" alt="' . $this->title . '" title="' . $this->title . '" data-lightbox="' . $collection[2] . '">';
                    $index++;

                    $find[$index] = 'img_' . str_replace('../articlesImg/' . $this->url . '/', '', $collection[2]) . ':left';
                    $replase[$index] = '<img src="' . $collection[2] . '" class="img-responsive pull-left width-40-pct imgZoom"  alt="' . $this->title . '" title="' . $this->title . '" data-lightbox="' . $collection[2] . '">';
                    $index++;

                    $find[$index] = 'img_' . str_replace('../articlesImg/' . $this->url . '/', '', $collection[2]) . ':right';
                    $replase[$index] = '<img src="' . $collection[2] . '" class="img-responsive pull-right width-40-pct imgZoom"   alt="' . $this->title . '" title="' . $this->title . '" data-lightbox="' . $collection[2] . '">';
                    $index++;

                }
                mysqli_free_result($collections);
            }

        }

        $find[$index] = 'img_index:cen';
        $replase[$index] = '<img src="' . $this->img . '" class="img-responsive imgZoom" style="width:100%" alt="' . $this->title . '" title="' . $this->title . '" data-lightbox="' . $this->img . '">';
        $index++;

        $find[$index] = 'img_index:left';
        $replase[$index] = '<img src="' . $this->img . '" class="img-responsive pull-left width-40-pct imgZoom"  alt="' . $this->title . '" title="' . $this->title . '" data-lightbox="' . $this->img . '">';
        $index++;

        $find[$index] = 'img_index:right';
        $replase[$index] = '<img src="' . $this->img . '" class="img-responsive pull-right width-40-pct imgZoom"   alt="' . $this->title . '" title="' . $this->title . '" data-lightbox="' . $this->img . '">';
        $index++;

        $result = str_replace($find, $replase, $result);

        $result = '<div id="ul-id-2-4" class="col ul-col col-xs-12 col-sm-12 col-md-12"><p>'
            //. '<picture><img src="' . $this->img . '" class="imgZoom" style="width:100%" title="' . $this->title . '" alt="' . $this->title . '"></picture>'
			.'</p><p>'
            . $result . '</p></div>';

        return $result;
    }

    public function articlesInfo()
    {
        if (isset($_GET['article'])) {
            $get = $_GET['article'];
            $this->url = $get;
            $datas = $this->selectArticle('WHERE url = "' . $this->url . '" LIMIT 1');

            if ($datas && mysqli_num_rows($datas) > 0) {
                $data = mysqli_fetch_array($datas, MYSQLI_NUM);
                mysqli_free_result($datas);
                $this->initParam($data);
                return [1];
            }

            return [0, '/articles'];
        }
        return [0, '/articles'];
    }

    public function initParam($data)
    {
        $this->id = $data[0];
        $this->title = $data[1];
        $this->description = $data[2];
        $this->url = $data[3];
        $this->imgCollectionId = $data[4];
        $this->incomplete = $data[5];
        $this->text = $data[6];
        $this->img = $data[7];
        $this->author = $data[8];
    }

    public function selectArticleInit()
    {
        $datas = $this->db->select('*', 'articles', 'WHERE id=' . $this->id);

        if ($datas) {
            $data = mysqli_fetch_array($datas, MYSQLI_NUM);
            $this->initParam($data);
            mysqli_free_result($datas);
        }
    }

    public function selectArticle($where = 'WHERE 1 ORDER BY id DESC')
    {
        return $this->db->select('*', 'articles', $where);
    }

    public function selectArticleNameAll($name)
    {
        if ($name) {
            $where = ' WHERE (`title` LIKE "%' . $name . '%") OR (`url` LIKE "%' . $name . '%") OR (`text` LIKE "%' . $name . '%")';
            return $this->db->select('*', 'articles', $where);
        }

        return $this->selectArticle();
    }

    protected function collection()
    {
        $this->images;
        $this->insertCollection();
    }

    public function insertArticle()
    {
        try {
            $this->sqlCheck();

            $into = '`articles`(`title`,`description`,`url`,`imgCollectionId`,`incomplete`,`text`,`img`,`author`)';
            $value = '("' . $this->title . '","' . $this->description . '","' . $this->url . '","' . $this->imgCollectionId . '",
            "' . $this->incomplete . '","' . $this->text . '","' . $this->img . '","' . $this->author . '")';

            $this->db->insert($into, $value);
            $this->imgCollect = $this->url;

            return [0, 'Статья успешно добавлена'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function updateArticle()
    {
        try {
            $this->sqlCheck();
            $set = '`title` = "' . $this->title . '", `description` = "' . $this->description .
                '", `incomplete` = "' . $this->incomplete . '",`text` = "' . $this->text . '", `url` = "' . $this->url . '"
                ,`imgCollectionId` = "' . $this->imgCollectionId . '",`img` = "' . $this->img . '",`author` = "' . $this->author . '"';

            $this->db->update('`articles`', $set, 'id = ' . $this->id);

            return [0, 'Информация успешно изменена'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function deleteArticle()
    {
        try {
            $dir = '../articlesImg/' . $this->url . '/';
            $this->imgCollect = $this->url;
            $this->deleteCollection($dir, false);

            $this->db->delete('`articles`', 'id=' . $this->id);

            return [0, 'Статья успешно удалена'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function updateImg($fileEnd): array
    {
        try {
            if (!copy('../articlesImg/tmp/' . $this->img, '../articlesImg/img/' . $this->img)) {
                $fileError = fopen('../error/gift.log', 'a');

                $text = ' ';
                $text .= date('Y-m-d H:i:s');
                $text .= ' ; ' . $_SERVER['REMOTE_ADDR'] . ';' . $_SERVER['HTTP_USER_AGENT'];
                $text .= '../articlesImg/tmp/' . $this->img . ' <-prev: gift-> ' . '../articlesImg/img/' . $this->img;
                $text .= " Ошибка загрузки файла.\n";

                fwrite($fileError, $text);
                fclose($fileError);
            } else {
                if (file_exists($fileEnd))
                    unlink($fileEnd);
                if (file_exists('../articlesImg/tmp/' . $this->img))
                    unlink('../articlesImg/tmp/' . $this->img);
            }

            $this->sqlCheck();
            $set = '`img` = "' . $this->img . '"';
            $this->db->update('`articles`', $set, 'id = ' . $this->id);

            return [0, 'картинка успешно обновлена'];

        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }
}

if (isset($_FILES['fileArticles'])) {

    if (0 < $_FILES['fileArticles']['error']) {
        echo '{"Error": "' . $_FILES['fileArticles']['error'] . '","file":"-1"}';
    } else {
        $file_name = $_FILES['fileArticles']['name'];
        $file_dir = '../articlesImg/tmp/' . $_FILES['fileArticles']['name'];
        $file_dir = str_replace(' ', '_', $file_dir);
        move_uploaded_file($_FILES['fileArticles']['tmp_name'], $file_dir);
        echo '{"file":"' . $file_name . '"}';
    }
}

