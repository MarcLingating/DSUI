</aside class="wrapper">


<div class="wrapper">
     
	  <div class="body-overlay"></div>
	 
	 <!-------sidebar--design------------>
	 
	 <div id="sidebar">
	    <div class="sidebar-header">
		   <h3><img src="assets/image/DepEd.png" class="img-fluid"/><span>SOCMOBNET </span></h3>
		</div>
		<ul class="list-unstyled component m-0">
		  <li class="active">
		  <a href="./" class="dashboard"><i class="material-icons">dashboard</i>dashboard </a>
		  </li>
	
		  <?php if($_SESSION['login_type'] == 1): ?>		
		  <li class="nav-link dropdown">
		  <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">person_add</i>User
		  </a>	
		  <ul class="collapse list-unstyled menu" id="homeSubmenu1">
		     <li>
				<a href="./index.php?page=new_user" class="nav-link nav-document_list tree-item ">add new</a>
			</li>
			 <li><a href="./index.php?page=user_list" >list</a></li>
		  </ul>
		  </li>

		<!-- form   < ?php else: ?> --->
		  
		   <li class="dropdown">
		  <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">list_alt</i>Forms
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu2">
		     <li><a href="./index.php?page=forms" class="nav-link nav-document_list tree-item">Add New</a></li>
			 <li><a href="./index.php?page=form_list" class="nav-link nav-document_list tree-item">List</a></li>
		  </ul>
		  </li>

		  <li class="dropdown">
		  <a href="./index.php?page=upload_documents" class=""><i class="material-icons">send</i>Send Document </a>
		  </li>
		  
		   <li class="dropdown">
		  <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">folder_open</i>Recieved Documents
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu3">
		     <li><a href="./index.php?page=receive_document" class="nav-link nav-document_list tree-item">Open</a></li>
			 <li><a href="./index.php?page=receive_document_close_list" class="nav-link nav-document_list tree-item">Close</a></li>

		  </ul>
		  </li>

		   <li class="dropdown">
		  <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">school</i>School
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu4">
		     <li><a href="./index.php?page=school" class="nav-link nav-document_list tree-item">Add</a></li>
			 <li><a href="./index.php?page=school_list" class="nav-link nav-document_list tree-item">List</a></li>

		  </ul>
		  </li>
		   
		  <li class="">
		  <a href="./index.php?page=announcement" class=""><i class="material-icons">date_range</i>Annoucement </a>
		  </li> 
		
		  <?php else: ?>
		   <li class="dropdown">
		  <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" 
		  class="dropdown-toggle">
		  <i class="material-icons">border_color</i>Documents
		  </a>
		  <ul class="collapse list-unstyled menu" id="homeSubmenu5">
		     <li><a href="./index.php?page=new_document" class="nav-link nav-document_list tree-item">Add New</a></li>
			 <li><a href="./index.php?page=document_list" class="nav-link nav-document_list tree-item">List</a></li>
		  </ul>
		  </li>
		  
		  <li class="">
		  <a href="./index.php?page=announcement" class=""><i class="material-icons">date_range</i>Annoucements </a>
		  </li> 

		  <li class="">
		  <a href="./index.php?page=data_retrieve" class=""><i class="material-icons">description</i>Recieved Document </a>
		  </li> 

		   
		  <?php endif; ?>


		</ul>
	 </div>
  <aside>
  </aside>
  <script>
  	$(document).ready(function(){
  		var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
  		if($('.nav-link.nav-'+page).length > 0){
  			$('.nav-link.nav-'+page).addClass('active')
          console.log($('.nav-link.nav-'+page).hasClass('tree-item'))
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
          $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
      $('.manage_account').click(function(){
        uni_modal('Manage Account','manage_user.php?id='+$(this).attr('data-id'))
      })
  	})
	$(document).ready(function () {
            $('#list').DataTable(); // Use DataTable instead of dataTable
        });

    $(document).ready(function(){
	      $(".xp-menubar").on('click',function(){
		    $("#sidebar").toggleClass('active');
			$("#content").toggleClass('active');
		  });
		  
		  $('.xp-menubar,.body-overlay').on('click',function(){
		     $("#sidebar,.body-overlay").toggleClass('show-nav');
		  });
		  
	   });
  </script>