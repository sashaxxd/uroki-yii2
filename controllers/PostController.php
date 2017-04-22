<?php
/**
 * User: noutsasha
 * Date: 12.04.2017
 * Time: 15:14
 */

namespace app\controllers;
use app\models\Category;
use app\models\Create;
use app\models\Delete;
use app\models\Update;
use Yii;
use app\models\TestForm;


class PostController extends AppController//Одно пространство имен не надо подключать use
{
    //указываем шаблон для всего контроллера
    public $layout = 'template';

    public function actionIndex()
    {
        if (Yii::$app->request->isAjax)// Если отправлено методом аякс
        {
            // Debug($_POST);// Распечатываем данные с post обчным способом
            Debug(Yii::$app->request->post());// Распечатываем данные с post методом YII
            return 'test';

        }
        $model = new TestForm();
        if ($model->load(Yii::$app->request->post()))// Если данные загружены в модель
        {
            //Debug($model);die;
            if ($model->validate()) {
                Yii::$app->session->setFlash('sucсess', 'Данные приняты');// Запись в сессию при валидации
                return $this->refresh();// Сбрасываем данные с формы
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка');
                //return $this->refresh();// тут не будем сбрасывать данные что бы можно было поправить ЕСЛИ ВВЕЛ НЕ ВЕРНО
            }

        }

        return $this->render('test', [
            'model' => $model,
        ]);
    }

    public function  actionShow()
    {
        $this->view->title = 'Одын одын';// Указываем тайтл для конкретного экшэна
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевые слова']);//метод для метатегов
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание']);
        //$this->layout = 'template'; указываем шаблон для конкретного экшена

        //$cats = Category::find()->all(); // Все данные из базы в видео объектов
        //$cats = Category::find()->orderBy(['id' => SORT_DESC])->all();//Cортируем по id в обратном
        //$cats = Category::find()->orderBy(['id' => SORT_ASC])->all();//Cортируем по id
        //$cats = Category::find()->asArray()->all(); // Все данные в виде массива (быстрее работает)
        //$cats = Category::find()->asArray()->where('parent = 691')->all();
        //$cats = Category::find()->asArray()->where(['parent' => '691'])->all(); // В виде массива
        //$cats = Category::find()->asArray()->where(['like', 'title', 'запчасти'])->all(); // Запрос для поиска
        //$cats = Category::find()->asArray()->where(['<=', 'id', '695'])->all(); // SELECT * FROM `categories` WHERE `id` <= '695'
        //$cats = Category::find()->asArray()->where('parent = 691')->limit(1)->all();
        //$cats = Category::find()->asArray()->where('parent = 691')->limit(1)->one();//Обязательно ставить лимит даже если one
        //$cats = Category::find()->asArray()->where('parent = 691')->count();//Количестов записей с условием
        //$cats = Category::find()->asArray()->count(); //Кол-во записей всех
        //$cats = Category::findOne(['parent' => '691']);//Другой способ вернуть один объект
        //$cats = Category::findAll(['parent' => '691']);//Другой способ вернуть все объекты
        /*
         * Cпособ самостоятельного построения запросов
         *
         *   $query = "SELECT * FROM categories WHERE title LIKE :search";
         *   $cats = Category::findBySql($query, [':search' => '%pp%'])->all();
         */

        //$cats = Category::findOne(694);//Ленивая загрузка
        //$cats = Category::find()->with('products')->where('id = 694')->all();  // Жадна загрузка используем метод with('products')
        //$cats = Category::find()->all(); // Ленивая или отложенная загрузка
        $cats = Category::find()->with('products')->all(); // Жадна загрузка используем метод with('products') куда меньше запросов к базе

        return $this->render('show', compact('cats'));
    }

    public function actionCreate()//запись в базу
    {
        if (Yii::$app->request->isAjax)// Если отправлено методом аякс
        {
            // Debug($_POST);// Распечатываем данные с post обчным способом
            Debug(Yii::$app->request->post());// Распечатываем данные с post методом YII
            return 'test';

        }
        $model = new Create();

        //$model->name = 'Саша';
        //$model->email = 'dsvsdvcds@lk.iu';
        //$model->text = 'Саша';
        //$model->save();//Метод save валидация берется из моделе если не надо валидировать ставим false


        if ($model->load(Yii::$app->request->post()))// Если данные загружены в модель
        {
            //Debug($model);die;
            if ($model->save()) {
                Yii::$app->session->setFlash('sucсess', 'Данные приняты');// Запись в сессию при валидации
                return $this->refresh();// Сбрасываем данные с формы
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка');
                //return $this->refresh();// тут не будем сбрасывать данные что бы можно было поправить ЕСЛИ ВВЕЛ НЕ ВЕРНО
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionUpdate()//изменяем запись
    {
        if (Yii::$app->request->isAjax)// Если отправлено методом аякс
        {
            // Debug($_POST);// Распечатываем данные с post обчным способом
            Debug(Yii::$app->request->post());// Распечатываем данные с post методом YII
            return 'test';

        }

        $model = Update::findOne(3); // При изменении записи в базе мы вызываем статичный метод

        //$model = new Update(); // При загрузке в базу мы создавали объект

        //$model->name = 'Саша';
        //$model->email = 'dsvsdvcds@lk.iu';
        //$model->text = 'Саша';
        //$model->save();//Метод save валидация берется из моделе если не надо валидировать ставим false


        if ($model->load(Yii::$app->request->post()))// Если данные загружены в модель
        {
            //Debug($model);die;
            if ($model->save()) {
                Yii::$app->session->setFlash('sucсess', 'Данные приняты');// Запись в сессию при валидации
                return $this->refresh();// Сбрасываем данные с формы
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка');
                //return $this->refresh();// тут не будем сбрасывать данные что бы можно было поправить ЕСЛИ ВВЕЛ НЕ ВЕРНО
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete()//изменяем запись
    {
        if (Yii::$app->request->isAjax)// Если отправлено методом аякс
        {
            // Debug($_POST);// Распечатываем данные с post обчным способом
            Debug(Yii::$app->request->post());// Распечатываем данные с post методом YII
            return 'test';

        }

        $model = Delete::findOne(3); // При изменении записи в базе мы вызываем статичный метод

        //Delete::deleteAll(['>','id','3']);//Удаляем все где айди больше 3

        //$model = new Update(); // При загрузке в базу мы создавали объект

        //$model->name = 'Саша';
        //$model->email = 'dsvsdvcds@lk.iu';
        //$model->text = 'Саша';
        //$model->save();//Метод save валидация берется из моделе если не надо валидировать ставим false


        if ($model->load(Yii::$app->request->post()))// Если данные загружены в модель
        {
            //Debug($model);die;
            if ($model->delete()) {
                Yii::$app->session->setFlash('sucсess', 'Данные приняты');// Запись в сессию при валидации
                return $this->refresh();// Сбрасываем данные с формы
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка');
                //return $this->refresh();// тут не будем сбрасывать данные что бы можно было поправить ЕСЛИ ВВЕЛ НЕ ВЕРНО
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionAjax()
    {



            return $this->render('ajax');


    }

    public function actionMain()
    {
        if (Yii::$app->request->isAjax)// Если отправлено методом аякс
        {


            $search = Yii::$app->request->post();// Распечатываем данные с post методом YII


            $search = trim(implode($search));


            $query = Category::find()->asArray()->where(['like', 'title', $search])->all();//Делаем выборку из базы

            if(!$query || $search == null)
            {
                echo 'Поиск не дал результатов';die;
            }

            //Debug($query);
            foreach ($query as $q)
            {
                echo $q['title'].'<br>';
            }
        }




    }
}