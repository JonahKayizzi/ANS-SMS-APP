<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property string $department
 * @property string $email
 * @property string $phone_number
 * @property string $position
 * @property string $category
 * @property string $modified
 * @property string $role
 * @property integer $status
 */
class Users extends CActiveRecord
{
	public $category_ids = array();
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, username, password, position, user_department_id, email', 'required'),
			array('status, user_group_id, user_department_id, user_division_id', 'numerical', 'integerOnly'=>true),
			array('name, username, password', 'length', 'max'=>256),
			array('department, position, category', 'length', 'max'=>128),
			array('category_ids', 'type', 'type' => 'array', 'allowEmpty' => true),
			array('email', 'length', 'max'=>64),
			array('phone_number', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, department, email, phone_number, position, category, modified, status, username, password, user_group_id, user_department_id, user_division_id', 'safe', 'on'=>'search'),
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
			'userGroup' => array(self::BELONGS_TO, 'UserGroups', 'user_group_id'),
			'userDepartment' => array(self::BELONGS_TO, 'UserDepartments', 'user_department_id'),
			'userDivision' => array(self::BELONGS_TO, 'UserDivisions', 'user_division_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'department' => 'Department',
			'email' => 'Email',
			'phone_number' => 'Phone Number',
			'position' => 'Position',
			'category' => 'Category',
			'modified' => 'Modified',
			'status' => 'Status',
			'username' => 'Username',
			'password' => 'Password',
            'role' => 'Role',
			'user_group_id' => 'User Group',
			'user_department_id' => 'Department',
			'user_division_id' => 'Division',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria; if(!(Users::model()->checkIfUserCategoryInAdmin())){ $criteria->compare('current_user_id',Yii::app()->user->id); }

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',1);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function getUsersOptions(){
		$titles = Users::model()->findAll();
		$data = array(null=>"Select User");
		foreach($titles as $model){
			$data[$model->id] = $model->name;
		}
		return $data;
	}
	
	public static function getDepartmentOptions(){
		$cats = @Users::model()->findAll();
		$data = array(null=>"Select User Department");
		foreach($cats as $model){
			$data[$model->department] = $model->department;
		}
		return $data;
	}
	
	public static function checkIfUserIsAdmin(){
		/* $user = Users::model()->findByPk(Yii::app()->user->id);
		if($user->category == 'admin'){return true;}else{return false;} */
		
		$users_id = Yii::app()->user->id;
		$info = @UsersCategories::model()->findAll("user_id = {$users_id} and status = 1 and category_id = 1");
		if(!empty($info)){return true;}else{return false;}
		
	}
	public static function checkIfUserIsImplementor(){
		/* $user = Users::model()->findByPk(Yii::app()->user->id);
		if($user->category == 'admin'){return true;}else{return false;} */
		
		$users_id = Yii::app()->user->id;
		$info = @UsersCategories::model()->findAll("user_id = {$users_id} and status = 1 and category_id in (5, 1)");
		if(!empty($info)){return true;}else{return false;}
		
	}
	public static function checkIfUserIsInvestigator(){
		/* $user = Users::model()->findByPk(Yii::app()->user->id);
		if($user->category == 'admin'){return true;}else{return false;} */
		
		$users_id = Yii::app()->user->id;
		$info = @UsersCategories::model()->findAll("user_id = {$users_id} and status = 1 and category_id in (4, 1)");
		if(!empty($info)){return true;}else{return false;}
		
	}
	
	public static function checkIfUserIsAuditor(){
		/* $user = Users::model()->findByPk(Yii::app()->user->id);
		if($user->category == 'admin'){return true;}else{return false;} */
		
		$users_id = Yii::app()->user->id;
		$info = @UsersCategories::model()->findAll("user_id = {$users_id} and status = 1 and category_id in (2, 1)");
		if(!empty($info)){return true;}else{return false;}
		
	}
	
	public static function checkIfUserCategoryInAdmin(){
		/* $user = Users::model()->findByPk(Yii::app()->user->id);
		if($user->category == 'admin'){return true;}else{return false;} */
		
		$users_id = Yii::app()->user->id;
		$info = @UsersCategories::model()->findAll("user_id = {$users_id} and status = 1 and category_id = 1");
		if(!empty($info)){return true;}else{return false;}
	}
	
	public static function checkIfUserIsOfficer(){
		$user = Users::model()->findByPk(Yii::app()->user->id);
		if($user->category == 'officer'){return true;}else{return false;}
	}
	
	/* public static function checkIfUserIsInvestigator(){
		$user = Users::model()->findByPk(Yii::app()->user->id);
		if($user->category == 'investigator'){return true;}else{return false;}
	} */
	
	public function getOfficers(){
		$titles = Users::model()->findAll("category = 'officer'");
		$data = array(null=>"Select Officer");
		foreach($titles as $model){
			$data[$model->id] = $model->name;
		}
		return $data;
	}
	
	
	
	public function getOfficers2(){
		$titles = Users::model()->findAll("status = 1");
		$data = array(0=>"All");
		foreach($titles as $model){
			$data[$model->id] = $model->name;
		}
		return $data;
	}
	
	public function getInvestigators(){
		$titles = Users::model()->findAll("status = 1 and id in (select user_id from users_categories where status = 1 and category_id in (1, 4))");
		$data = array(null=>"Select Investigator");
		foreach($titles as $model){
			$data[$model->id] = $model->name;
		}
		return $data;
	}
	
	public function getImplementors(){
		$titles = Users::model()->findAll("status = 1 and id in (select user_id from users_categories where status = 1 and category_id in (1, 5))");
		$data = array(null=>"Select Implementor");
		foreach($titles as $model){
			$data[$model->id] = $model->name;
		}
		return $data;
	}
	
	public function getAuditeeRepresentatives(){
		$titles = Users::model()->findAll("status = 1 and id in (select user_id from users_categories where status = 1 and category_id in (1, 3))");
		$data = array(null=>"Select Auditee Representative");
		foreach($titles as $model){
			$data[$model->id] = $model->name;
		}
		return $data;
	}
	
	public static function checkIfUserIsCurrentRecordViewer(){
		$current_user = Yii::app()->user->id;
		$current_record_id = Yii::app()->request->getParam('id');
		$current_record = Users::model()->findByPk($current_record_id);
		if(($current_record->current_user_id == $current_user)||(@Users::model()->checkIfUserCategoryInAdmin())){return true;}else{return false;}
	}
}
