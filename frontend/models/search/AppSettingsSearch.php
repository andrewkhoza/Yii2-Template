<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AppSettings;

/**
 * AppSettingsSearch represents the model behind the search form of `app\models\AppSettings`.
 */
class AppSettingsSearch extends AppSettings
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'inactive_time', 'send_emails'], 'integer'],
            [['email_admin'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = AppSettings::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'inactive_time' => $this->inactive_time,
            'send_emails' => $this->send_emails,
        ]);

        $query->andFilterWhere(['like', 'email_admin', $this->email_admin]);

        return $dataProvider;
    }
}
