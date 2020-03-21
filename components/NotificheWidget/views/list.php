<?php

$url = json_encode(\yii\helpers\Url::to(['notifica/list-ajax']));

$js = <<< JS
    $(document).ready(function() {
    
    	setTimeout(function() {
        	$.ajax({
            url: $url,
            dataType: "json",
            success: function(data) {
   					if(data.count > 0)
            			$('#notifiche-number-badge').html(data.count);
            		$('#notifiche-list').append(data.list);	                
            	}
        	}) 
    	}, 2000);
    
});
       
JS;
$this->registerJs($js);

?>
<?php /* 


setTimeout(function() {
        $.ajax({
            url: $url,
            dataType: "json",
            success: function(data) {
                alert('Notifiche');                
            }
        }) 
    }, 2000);
<ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may
                                        not fit into the page and may cause design problems
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                    */ ?>