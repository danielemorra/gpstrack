<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * StatisticheForm è il modello utilizzato in home page x digitare l'anno di riferimento x estrarre le statistiche.
 */
class StatisticheHomeForm extends Model
{
    public $annoStatistiche;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // controlla che sia un numerico
            [['annoStatistiche'], 'integer', 'message' => "Digita l'anno"],
        ];
    }

}
