## View - Best layout management for CodeIgniter

### How to use

download View.php library [here](https://github.com/didanurwanda/codeigniter-layout-management/archive/master.zip) and copy to library folder

#### Controller

```PHP
<?php

class Welcome extends CI_Controller
{
    public $title = '';
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('view', array());
        $this->view->init($this); // required
    }
    
    public function index()
    {
        $this->view->render('index'); // for directory 'welcome/index.php'
    }
}

```

#### View

You must create a directory layouts/name_layout.php *default main.php*

```PHP
<!DOCTYPE html>
<html>
<head>
    <title><?= $this->title ?></title>
</head>
<body>
    
    <h1>Hello CodeIgniter</h1>
    <?= $this->view->content() ?>

</body>
</html>
```

then create a directory with files welcome/index.php

controller name and directory for view most be same but have to lowercase

```PHP
<?php
$this->title = 'Hallo Content'; // set title
?>

<h4>Hallo Content</h4>
```

#### API

* Change layout name

```PHP
// on controller
$this->view->setLayout('main2');
```

* Partial view

```PHP
$this->view->renderPartial('index', array());
```

* View to string

```PHP
$string = $this->view->render('index', array('data' => $data), true);
$string = $this->view->renderPartial('index', array('data' => $data), true); 
```