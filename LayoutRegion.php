<?php
namespace sheillendra\jeasyui;

class LayoutRegion extends Widget
{
    private $content=[];
    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        if(isset($this->clientOptions['content']) && is_array($this->clientOptions['content'])){
            $this->content = $this->clientOptions['content'];
            $this->clientOptions['content']=null;
        }
    }
    
    public function run()
    {
        $this->registerScript('layout');
        foreach($this->content as $plugin=>$clientOptions){
            call_user_func_array([parent::pluginMap($plugin),'widget'],[
                ['parent'=>$this->clientOptions['id'],'clientOptions'=>$clientOptions]
            ]);
        }
    }
}