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
    public $meseStatistiche;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // controlla che sia un numerico
            [['annoStatistiche'], 'required', 'message' => "Digita l'anno"],
            [['annoStatistiche'], 'integer', 'message' => "Digita un anno numerico a 4 cifre (yyyy)"],
            [['meseStatistiche'], 'required', 'message' => "Digita l'anno"],
        ];
    }

}
