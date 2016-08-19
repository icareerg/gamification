<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PlayerSearch represents the model behind the search form about `app\models\Player`.
 */
class PlayerSearch extends Player
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['player_id', 'level_id'], 'integer'],
            [['player_name', 'passwd'], 'safe'],
            [['level_name', 'passwd'], 'string'],
            [['experience', 'integral'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Player::find();
        $query->joinWith(['level']);
        $query->select(Player::tableName().'.*,'.PlayerLevel::tableName().'.level_name');

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
            'player_id' => $this->player_id,
            'level_id' => $this->level_id,
            'experience' => $this->experience,
            'integral' => $this->integral,
        ]);

        $query->andFilterWhere(['like', 'player_name', $this->player_name])
            ->andFilterWhere(['like', 'level_name', $this->level_name]);

        return $dataProvider;
    }
}
