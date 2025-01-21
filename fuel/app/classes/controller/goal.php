<?php



use Fuel\Core\Controller_Rest;
use Fuel\Core\Input;
use Fuel\Core\Response;
use Fuel\Core\Security;
use Fuel\Core\View;
use Fuel\Core\Log;


class Controller_Goal extends Controller_Rest
{
    public function post_create()
    {
        $goal = Input::json('goal');

        if (empty($goal)){
            return $this->response(['success' => false, 'message' => 'Goal is required'], 400);
        }

        if(!Security::check_token()){
            return $this->response(['success' => false, 'message'=> 'Invalid CSRG token'], 403);
        }

        try{
            $user_id = 1;
            $newGoal = Model_Goal::forge([
                'user_id' => $user_id,
                'goal' => $goal,
            ]);
            $newGoal->save();

            return $this->response(['success' => true, 'message' => 'Goal created successfully']);
        }catch(Exception $e){
            Log::error('Failed to create goal: ' .$e->getMessage());
            return $this ->response(['success' =>false, 'message' => 'Failed to create goal'], 500);
        }
    }
    public function post_update()
    {
        $goal = Input::json('goal');

        if (empty($goal)) {
            return $this->response(['success' => false, 'message' => 'Goal is required'], 400);
        }

        //CSRFトークンの検証
        if(!Security::check_token()){
            return $this->response(['success' => false, 'message' => 'Invalid CSRF token'], 403);
        }

        //データベースに保存する
        try{
            $user_id = 1;
            $existingGoal = Model_Goal::find('first',['where'=>['user_id' => $user_id]]);

            if($existingGoal){
                $existingGoal->goal= $goal;
                $existingGoal->save();
            }else{
                Model_Goal::forge([
                    'user_id' => $user_id,
                    'goal' => $goal,
                ])->save();
            }
            return $this->response(['success' =>true, 'message' => 'Goal updated successfully']);

        } catch (Exception $e){
            Log::error('Failed to update goal: '. $e->getMessage());
            return $this->response(['success' => false, 'message' => 'Failed to update goal'],500);
        }

        


    }
}
