<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ObiettiviForm è il modello utilizzato in home page x digitare l'anno di riferimento x estrarre gli Obiettivi.
 */
class ObiettiviHomeForm extends Model
{
    public $annoObiettivi;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // controlla che sia un numerico
            [['annoObiettivi'], 'integer', 'message' => "Digita l'anno"],
        ];
    }

}
