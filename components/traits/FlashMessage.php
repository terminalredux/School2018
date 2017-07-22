<?php    
namespace app\components\traits;
use Yii;
trait FlashMessage{
    
    /* Method create success message
     * @param string $message  
     */
    public function success($message)
    {
        Yii::$app->getSession()->setFlash('alert',[
                'body'=> $message,
                'options'=>['class'=>'alert alert-success']
            ]);
    }
    
    /* Method create error message
     * @param string $message  
     */
    public function error($message)
    {
         Yii::$app->getSession()->setFlash('alert',[
                'body'=> $message,
                'options'=>['class'=>'alert alert-danger']
            ]);
    }
    
}    
?>