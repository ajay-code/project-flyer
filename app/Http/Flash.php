<?php 

namespace App\Http;

class Flash
{
    public function create($title, $message, $level = 'info', $key = 'flash_message'){
        session()->flash($key, [
            'message'       => $message,
            'title'         => $title,
            'level'         => $level
        ]);
    }

    public function success($title, $message)
    {
        $this->create($title, $message, 'success');
    }

    public function error($title, $message)
    {
        $this->create($title, $message, 'error');
    }
    public function info($title, $message)
    {
        $this->create($title, $message, 'info');
    }

   
    public function overlay($title, $message, $level ='success')
    {
        $this->create($title, $message, $level, 'flash_message_overlay');
    }
}
