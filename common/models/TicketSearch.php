<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ticket;
use Yii;

/**
 * TicketSearch represents the model behind the search form of `common\models\Ticket`.
 */
class TicketSearch extends Ticket
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_by'], 'integer'],
            [['title', 'description', 'created_at', 'updated_at'], 'safe'],
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
     * @param string|null $formName Form name to be used into `->load()` method.
     * @param bool $filterByUser Whether to filter by current user (for frontend). Defaults to true.
     * 
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null, $filterByUser = true)
    {
        $query = Ticket::find();

        // Only filter by user for frontend app, not backend (admin)
        $isFrontend = Yii::$app->id === 'app-frontend';

        if ($isFrontend && !Yii::$app->user->isGuest) {
            $query->andWhere(['created_by' => Yii::$app->user->id]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => ['defaultOrder' => ['created_at' => SORT_DESC]],
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
            // 'created_by' => $this->created_by,
        ]);

        if ($this->created_by) {
            $query->andFilterWhere(['created_by' => $this->created_by]);
        }

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
