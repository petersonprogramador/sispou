<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property int $pousada_id
 * @property string $nome
 * @property string $cpf
 * @property string $sexo
 * @property string $nascimento
 * @property string $cep
 * @property string $endereco
 * @property string $numero
 * @property string $bairro
 * @property string $cidade
 * @property string $uf
 * @property string $telefone
 * @property string $celular
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Pousada $pousada
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pousada_id', 'nome', 'endereco', 'bairro', 'cidade', 'uf', 'email'], 'required'],
            [['pousada_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nome', 'endereco', 'numero', 'bairro', 'cidade', 'uf', 'email'], 'string', 'max' => 255],
            [['cpf',], 'string', 'max' => 14],
            [['telefone'], 'string', 'max' => 16],
            [['sexo'], 'string', 'max' => 2],
            [['nascimento'], 'string', 'max' => 10],
            [['cep'], 'string', 'max' => 9],
            [['celular'], 'string', 'max' => 16],
            [['pousada_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pousada::className(), 'targetAttribute' => ['pousada_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pousada_id' => 'Pousada ID',
            'nome' => 'Nome',
            'cpf' => 'Cpf',
            'sexo' => 'Sexo',
            'nascimento' => 'Nascimento',
            'cep' => 'Cep',
            'endereco' => 'Endereco',
            'numero' => 'Numero',
            'bairro' => 'Bairro',
            'cidade' => 'Cidade',
            'uf' => 'Uf',
            'telefone' => 'Telefone',
            'celular' => 'Celular',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPousada()
    {
        return $this->hasOne(Pousada::className(), ['id' => 'pousada_id']);
    }
}
