<?php
require_once 'Connect.php';

class Promotions
{

    public $id;
    public $text;
    public $status;

    protected $db;

    public function __construct()
    {
        $this->db = new Connect();
    }

    public function __destruct()
    {
        $this->db->close();
    }

    public function showPromoRss(): string
    {
        $promotions = $this->selectPromoAction();
        if ($promotions && mysqli_num_rows($promotions)) {
            $promo = mysqli_fetch_array($promotions, MYSQLI_NUM);

            $this->id = $promo[0];
            $this->text = $promo[1];
            $this->status = $promo[2];
            $find = ['<a href="', 'style="color: #337ab7;"',
                'button_', 'end_'
            ];
            $replase = ['<a href="https://www.islandgift.ru/', '',
                '<a href="https://www.islandgift.rubutton_'
                , ''
            ];
            $text = str_replace($find, $replase, $promo[1]);
            $texts = explode('#$', $text);
            if (isset($texts[2])) {
                $texts[0] = str_replace('button_', $texts[1] . '">', $texts[0]);
                $text = $texts[0] . '</a>' . $texts[2];
            }
            mysqli_free_result($promotions);

            return $text;
        }
        return '';
    }

    public function showPromoAmp(): string
    {
        $promotions = $this->selectPromoAction();
        if ($promotions && mysqli_num_rows($promotions)) {
            $promo = mysqli_fetch_array($promotions, MYSQLI_NUM);

            $this->id = $promo[0];
            $this->text = $promo[1];
            $this->status = $promo[2];
            $find = ['<a href="', 'style="color: #337ab7;"',
                'button_', 'end_'
            ];
            $replase = ['<a href="https://www.islandgift.ru/amp/', '',
                '<div class="ul-widget ul-w-button text-center ul-scroll-animate"><a class="normal ul-w-button1 middle" target="_self" title="Подарок для тебя♥" href="https://www.islandgift.ru/ampbutton_'
                , ''
            ];
            $text = str_replace($find, $replase, $promo[1]);
            $texts = explode('#$', $text);
            if (isset($texts[2])) {
                $texts[0] = str_replace('button_', $texts[1] . '">', $texts[0]);
                $text = $texts[0] . '</a></div>' . $texts[2];
            }
            mysqli_free_result($promotions);

            return $text;
        }
        return '';
    }

    public function showPromo(): string
    {
        $promotions = $this->selectPromoAction();
        if ($promotions && mysqli_num_rows($promotions)) {
            $promo = mysqli_fetch_array($promotions, MYSQLI_NUM);

            $this->id = $promo[0];
            $this->text = $promo[1];
            $this->status = $promo[2];
            $find = ['<h2>', '</h2>',
                '<p>', '</p>',
                'button_', 'end_'
            ];
            $replase = ['<h2 style="text-align:center"><span class="g-color-text-1" style="opacity: 1.5;color: black">', '</span></h2>',
                '<p style="text-align:center"><span class="g-color-text-1" style="opacity: 1.5;color: black">', '</span></p>',
                '</div></div></div><div id="ul-id-0-57" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-58" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div><div id="ul-id-0-59" class="row ul-row"><div id="ul-id-0-60" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-61" class="ul-widget ul-w-button text-center" data-controls="mer" data-widget="button"> button_',
                '</div></div></div><div id="ul-id-0-57" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-58" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>'
            ];
            $text = str_replace($find, $replase, $promo[1]);
            $texts = explode('#$', $text);
            if (isset($texts[2])) {
                $texts[0] = str_replace('button_', '<a class="normal ul-w-button1 middle" target="_self" href="' . $texts[1] . '">', $texts[0]);
                $text = $texts[0] . '</a></div></div></div>' . $texts[2];
            }
            $text = ' <div id="ul-id-0-52" class="row ul-row">
                    <div id="ul-id-0-53" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-54" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div>
                    <div id="ul-id-0-55" class="col ul-col col-xs-12 col-sm-12 col-md-10">
                        <div id="ul-id-0-56" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg">
                            <div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word">' . $text;
            mysqli_free_result($promotions);
            return $text;
        }
        return '';
    }

    protected function sqlCheck(): void
    {
        $find = ["\n", "\"", '--',];
        $replase = ["\\n", "\\\"", '',];

        $this->id = str_replace($find, $replase, $this->id);
        $this->text = str_replace($find, $replase, $this->text);
        $this->status = str_replace($find, $replase, $this->status);
    }

    public function endPromo(): string
    {
        $where = ' ORDER BY id DESC LIMIT 1';
        $promos = $this->db->select('*', 'promotions', $where);
        $textResult = 'Акций нет!!! Необходимо добавить активную акцию с end_ !!!';

        if ($promos) {

            $promo = mysqli_fetch_array($promos, MYSQLI_NUM);
            $textResult = 'Последняя акция имеет индекс: ' . $promo[0] . '<br>';
            $where = ' WHERE `status` = 1 ORDER BY id DESC LIMIT 1';
            $promosActive = $this->db->select('*', 'promotions', $where);

            if ($promosActive) {
                $promoActive = mysqli_fetch_array($promosActive, MYSQLI_NUM);
                $textResult .= 'Активная акция имеет индекс: ' . $promoActive[0];
                mysqli_free_result($promosActive);
            } else
                $textResult .= 'Нет активных акций!!! Необходимо добавить активную акцию с end_ !!!';

            mysqli_free_result($promos);
        }

        return $textResult;
    }

    public function selectPromo()
    {
        $where = ' WHERE `id`=' . $this->id . '';
        return $this->db->select('*', 'promotions', $where);
    }

    public function selectPromoAll()
    {
        $where = ' WHERE 1';
        return $this->db->select('*', 'promotions', $where);
    }

    public function selectPromoAction()
    {
        $where = ' WHERE (`status` = 1) ORDER BY id DESC';
        return $this->db->select('*', 'promotions', $where);
    }

    public function insertPromo(): array
    {
        try {

            $this->sqlCheck();
            $into = '`promotions`(`text`,`status`)';
            $value = '("' . $this->text . '",' . $this->status . ')';
            $this->db->insert($into, $value);

            return [0, 'Акция успешно добавлена'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function updatePromo(): array
    {
        try {

            $this->sqlCheck();
            $set = '`text` = "' . $this->text . '", `status`=' . $this->status;
            $this->db->update('`promotions`', $set, 'id=' . $this->id);

            return [0, 'Акция успешно обновлена'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function deletePromo(): array
    {
        try {
            $this->db->delete('`promotions`', 'id=' . $this->id);

            return [0, 'Акция успешно удалена'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }
}
