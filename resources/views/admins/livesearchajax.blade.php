<?php
if(!empty($posts ))  
{ 
    $count = 1;
    $outputhead = '';
    $outputbody = '';  
    $outputtail ='';

    $outputhead .= '<div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Created At</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                ';
                  
    foreach ($posts as $post)    
    {   
    $body = substr(strip_tags($post->body),0,50)."...";
    $edit = url('/admin/edit/product/'.$post->id);
    $delete = url('/admin/delete/product/'.$post->id);

    $outputbody .=  ' 
                
                            <tr> 
		                        <td>'.$post->id.'</td>
		              
		                        <td>'.$post->product_name.'</td>
                                <td>'.$post->department_name.'</td>
                                <td>'.$post->brand.'</td>
                                <td>'.$post->unity.'</td>
                                <td>'.$post->purchase_price.'</td>
                                <td>'.$post->sale_price.'</td>
                                 <td> <form method="post" action="'.$delete.'">
                            <input type="hidden" name="_token" value="'.csrf_token().'" />
                            <a href="">
                                <button type="button" class="btn btn-primary actions"><i class="fa fa-eye"></i></button>
                            </a> 
                            <a href="'.$edit.'">
                                <button type="button" class="btn btn-success actions"><i class="fa fa-edit"></i></button>
                            </a>
                            <a>
                            <button type="submit" class="btn btn-danger actions"><i class="fa fa-trash"></i></button>
                            </a>
                    </form> </td>
                               
                            </tr> 



                    ';
                
    }  

    $outputtail .= ' 
                        </tbody>
                    </table>
                </div>';
         
    //echo $outputhead; 
    echo $outputbody; 
    //echo $outputtail; 
 }  
 
 else  
 {  
    echo 'Data Not Found';  
 } 

        
 ?>  