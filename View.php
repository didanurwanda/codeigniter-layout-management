<?php

class View
{

    /**
     * Context Controller
     * 
     * @var CI_Controller
     */
    public $controller;
    
    /**
     * @var string 
     */
    public $layout = 'layouts/main';
    
    /**
     * @var string
     */
    protected $output;

    /**
     * inheritdoc
     */
    public function __construct()
    {
        
    }

    /**
     * Initialize view library to set Controller context
     * @param CI_Controller $context
     */
    public function init($context)
    {
        $this->controller = $context;
    }

    /**
     * Set layout name 'default layouts/main' 
     * @param string $name
     */
    public function setLayout($name)
    {
        $this->layout = $name;
    }

    /**
     * Render view, this method like view() default CodeIgniter
     * If use this method, view render automatic with layout
     * @param string $view
     * @param array $data
     * @param boolean $return
     */
    public function render($view, $data = array(), $return = false)
    {
        $this->output = $this->renderPartial($view, $data, true);
        $this->loadLayout($data, $return);
    }

    /**
     * Render view, this method like view() default CodeIgniter
     * if use this method, view render without layout
     * @param string $view
     * @param array $data
     * @param boolean $return
     */
    public function renderPartial($view, $data = array(), $return = false)
    {
        return $this->controller->load->view(strtolower(get_class($this->controller)) . DIRECTORY_SEPARATOR . $view, $data, $return);
    }

    
    /**
     * @return string
     */
    public function content()
    {
        return $this->output;
    }

    /**
     * @param array $data
     * @param boolean $return
     */
    protected function loadLayout($data = array(), $return = false)
    {
        $this->controller->load->view($this->layout, $data, $return);
    }
}