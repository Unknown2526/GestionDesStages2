<?php
namespace App\Shell;
 use Cake\Console\Shell;
use Cake\Mailer\Email;
use Cake\ORM\TableRegistry;
 /**
 * Cron shell command.
 */
class CronShell extends Shell
{
     /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();
         return $parser;
    }
     /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
      $companies = TableRegistry::get('Milieudestages');
      $query = $companies
        ->find()
        ->select(['courriel_respo'])
        ->where(['created <= NOW() - INTERVAL 15 day' , 'actif' => false] );
      $email = new Email('default');
      foreach($query as $row){
         $email->to($row->email)
              ->subject('IMPORTANT ')
              ->send('veillez modifier vos information, vous avez un retard de 15 jours ou plus.');
       }
    }
}