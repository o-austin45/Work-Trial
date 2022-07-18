<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    
    public function indexAsc(){



        $one="https://images.pexels.com/photos/302743/pexels-photo-302743.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500";

        $two="https://images.pexels.com/photos/1172253/pexels-photo-1172253.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500";

        $three="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8aHVtYW58ZW58MHx8MHx8&w=1000&q=80";

        $four="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_MHqWpHv5_2sZkLTSS2RIZtGKtEVejjbVcyKBQuodzvb-injCLVN84l_TBHAPQFk8g7s&usqp=CAU";

        $arr1=(array($one, $two,$three,$four));

        sort($arr1);

        return view("images.asc", ["arr1"=>$arr1]);
    }

    public function indexDesc(){


        $one="https://images.pexels.com/photos/302743/pexels-photo-302743.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500";

        $two="https://images.pexels.com/photos/1172253/pexels-photo-1172253.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500";

        $three="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8aHVtYW58ZW58MHx8MHx8&w=1000&q=80";

        $four="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_MHqWpHv5_2sZkLTSS2RIZtGKtEVejjbVcyKBQuodzvb-injCLVN84l_TBHAPQFk8g7s&usqp=CAU";

        $arr1=(array($one, $two,$three,$four));

        rsort($arr1);

        return view("images.desc",["arr1"=>$arr1]);

    }

    public function indexRandom (){


        $one="https://images.pexels.com/photos/302743/pexels-photo-302743.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500";

        $two="https://images.pexels.com/photos/1172253/pexels-photo-1172253.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500";

        $three="https://images.unsplash.com/photo-1503023345310-bd7c1de61c7d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8aHVtYW58ZW58MHx8MHx8&w=1000&q=80";

        $four="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_MHqWpHv5_2sZkLTSS2RIZtGKtEVejjbVcyKBQuodzvb-injCLVN84l_TBHAPQFk8g7s&usqp=CAU";

        $arr1=(array($one, $two,$three,$four));

        return view("images.random",["arr1"=>$arr1]);




    }
}
