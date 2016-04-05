<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SfidaIscrizioneForm extends Model
{
    // Indica se le sfide da visualizzare sono quelle passate, in corso o ancora da inziare
    public $statoSfida;
    public $specialita;
    public $tipologia;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['statoSfida', 'specialita', 'tipologia'], 'safe'],
        ];
    }

}
