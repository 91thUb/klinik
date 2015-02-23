<?php

/**
 * This is the model class for table "riwayat_berobat".
 *
 * The followings are the available columns in table 'riwayat_berobat':
 * @property integer $id
 * @property integer $id_dokter
 * @property integer $id_pasien
 * @property integer $id_operator
 * @property string $keluhan
 * @property string $tanggal
 * @property double $totalBiaya
 * @property double $bayar
 *
 * The followings are the available model relations:
 * @property DetailBerobat[] $detailBerobats
 * @property Dokter $idDokter
 * @property Pasien $idPasien
 * @property Operator $idOperator
 */
class RiwayatBerobat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RiwayatBerobat the static model class
	 */
    
    public $containerObat;
    
    public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'riwayat_berobat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_dokter, id_pasien, keluhan, totalBiaya, bayar, containerObat', 'required'),
            array('totalBiaya, bayar', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_dokter, id_pasien, id_operator, keluhan, tanggal, totalBiaya, bayar', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'detailBerobats' => array(self::HAS_MANY, 'DetailBerobat', 'id_riwayat_berobat'),
			'idDokter' => array(self::BELONGS_TO, 'Dokter', 'id_dokter'),
			'idPasien' => array(self::BELONGS_TO, 'Pasien', 'id_pasien'),
			'idOperator' => array(self::BELONGS_TO, 'Operator', 'id_operator'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_dokter' => 'Dokter',
			'id_pasien' => 'Pasien',
			'id_operator' => 'Operator',
			'keluhan' => 'Keluhan',
			'tanggal' => 'Tanggal',
			'totalBiaya' => 'Total Biaya',
			'bayar' => 'Bayar',
            'containerObat' => 'Obat'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_dokter',$this->id_dokter);
		$criteria->compare('id_pasien',$this->id_pasien);
        
        if(Yii::app()->user->idTypeUser == 1)
        {
            $criteria->compare('id_operator', Yii::app()->user->idOperator);
        }
        else
        {
             $criteria->compare('id_operator', $this->id_operator);
        }
        
		$criteria->compare('keluhan',$this->keluhan,true);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('totalBiaya',$this->totalBiaya);
		$criteria->compare('bayar',$this->bayar);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    public function beforeSave()
    {
        $this->tanggal = new CDbExpression('NOW()');
        $this->id_operator = Yii::app()->user->idOperator;
        
        return true;
    }
    
    public function afterSave() 
    {
        DetailBerobat::model()->deleteAll('id_riwayat_berobat=:id', array(':id'=> $this->id));
        $this->saveDetail();
        
        return true;
    }
    
    
    private function saveDetail()
    {
         foreach($this->containerObat as $idObat)
        {
            $detail = new DetailBerobat;
            $detail->id_obat = $idObat;
            $detail->id_riwayat_berobat = $this->id;
            
            $detail->save();
        }
    }
    
    
}