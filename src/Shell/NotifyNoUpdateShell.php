<?php

namespace App\Shell;

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;
use Cake\Mailer\Email;

class NotifyNoUpdateShell extends Shell {

    public function main() {

        $links = TableRegistry::get('Milieudestages');
        $datas = $links->find();

        foreach ($datas as $data) {
            if ($data->created == $data->modified) {
                
                $email = new Email('default');
                $email->to($data->courriel_respo);
                $email->subject('Mettre a jour vos informations');
                $email->send('Cela fais 15 jours que vous n\'avez pas mis vos information à jours');
            }
        }
    }

}
