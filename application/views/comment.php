<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spritle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <style type="text/css">
     .badge-new{
    background: gray;
    border-radius: 50%;
    padding: 8px;
    font-size: 10px;
    color: #fff;
    margin-right: 7px;
}
.card-body.newdesign p{
    font-size: 12px;
    margin: 10px 0;
}
.d-flex.align-items{
    align-items: center;
    justify-content: end;
}
.d-flex.align-items span{
    padding: 0 5px;
}
.card.wid-style{
    /* width: 18rem; */
    margin: 1rem 0;
}
.d-flex.align-items span{
  cursor: pointer;
}
   </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
          <div class="text-right">
            <?php if(!isset($_SESSION['user_id'])) { ?>
                <a href="<?php echo base_url(); ?>login" align="left" class="">User Login</a>
              <?php } else{ ?>
              <a href="<?php echo base_url(); ?>logout" align="left" class="">Logout</a>
              <?php } ?>
              </div>
               <br><?php if(isset($_SESSION['user_id'])) { ?>
              <form action="<?php echo base_url();?>comment_add" method="post">
                <div class="form-group">
                <label for="comment_new">Add New Comment</label>
                <textarea class="form-control" required="" id="comment_new" name="comment_new" rows="4" cols="50">
                </textarea>
                 </div>
                 <div class="form-group">
                <label for="comment_new">title</label>
                <input type="text" class="form-control" name="title" value="">
                 </div>
                 <div class="form-group"><br>
                  <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <button type="submit" class="btn btn-primary">Submit</button>
                 </div>
             </form>
             <?php }  ?>
             <?php if(!empty($comment_all)) { 
              foreach ($comment_all as $key => $value) {
              ?>
          <div class="col-md-6 col-sm-12 align-self-center">
            <div class="card wid-style">
                
                <div class="card-body newdesign" >
                <div class="d-flex">
                    <span class="badge-new"><?php echo $value['user_name']; ?></span>
                    <h5 class="card-title"><?php echo $value['title']; ?></h5>
                </div>
                  <p class="card-text"><?php echo $value['content']; ?></p>
                 <div class="d-flex align-items">
                     <?php if(isset($_SESSION['user_id'])) { ?>
                     <a href="<?php echo base_url().'like/'.$value['id'].'/'.$_SESSION['user_id'];?>">Like</a> <span><?php echo $value['like']; ?></span>
                     <?php  }else {?>
                      <a href="">Like</a> <span><?php echo $value['like']; ?></span>
                     <?php } ?>
                     <img src="assets/icons/chat.svg" alt="">
                      <?php if(isset($_SESSION['user_id'])) { ?>
                     <span  onclick="get_comment('<?php echo $value['id']; ?>')"><?php echo $value['comment']; ?> Comments</span>
                     <?php }else{ ?>
                       <span><?php echo $value['comment']; ?> Comments</span>
                     <?php } ?>
                 </div>
                </div>
              </div>
             
            </div>
              <div class="col-md-6">
             <div class="card newdesign comment_bellow_<?php echo $value['id']; ?>"  style="display: none;">
                <div class="card-body">
                <form action="<?php echo base_url();?>comment_add_user" method="post">
                <div class="form-group">
                <label for="comment_new">Add New Comment</label>
                <textarea class="form-control" required="" id="comment_new" name="comment_new" rows="1" cols="10">
                </textarea>
                 </div>
                 <div class="form-group"><br>
                  <input type="hidden" name="comment_id" value="<?php echo $value['id']; ?>">
                  <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                <button type="submit" class="btn btn-primary">Add Comment</button>
                 </div>
             </form>
            
                </div>
                <?php 
                $this->db->select('*');
                $this->db->from('user_activity');
                $this->db->join('users', 'users.id = user_activity.user_id');
                $this->db->where('comment_id', $value['id']);
                $query = $this->db->get()->result();  
                if(!empty($query))
                {
                   foreach ($query as $key => $value1) {
                ?>
                 <?php if(isset($_SESSION['user_id'])) { ?>
                 <div class="card-body newdesign">
                  <div class="d-flex">
                    <span class="badge-new"><?php echo $value1->name; ?></span> <span class=""><?php echo $value1->Comment_content_user_add ; ?></span>
                 </div>

              </div>
                <?php } } } ?>
              </div>
              </div>
          <?php } }else{ ?><br>
          <div class="card">
          <div class="card-body">
            No Data Found.
          </div>
          <?php } ?>
</div>
        </div>
      </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
      function get_comment(id)
      {
        $('.comment_bellow_'+id).show();
      }
    </script>

  </body>
</html>