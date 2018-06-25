<?php

class PostsModel 
{
  private $title;
  private $post_content;
  private $status;
  private $creation_date;
  private $update_date;
  private $User_id_user;

  /**
   * Get the value of title
   */ 
  public function getTitle() : string
  {
    return $this->title;
  }

  /**
   * Set the value of title
   *
   * @return  self
   */ 
  public function setTitle($title) : string
  {
    $this->title = $title;

    return $this;
  }

  /**
   * Get the value of post_content
   */ 
  public function getPostContent() : string
  {
    return $this->post_content;
  }

  /**
   * Set the value of post_content
   *
   * @return  self
   */ 
  public function setPostContent($post_content) : string
  {
    $this->post_content = $post_content;

    return $this;
  }

  /**
   * Get the value of status
   */ 
  public function getStatus() : int
  {
    return $this->status;
  }

  /**
   * Set the value of status
   *
   * @return  self
   */ 
  public function setStatus($status) : int
  {
    $this->status = $status;

    return $this;
  }

  /**
   * Get the value of creation_date
   */ 
  public function getCreationDate() : int
  {
    return $this->creation_date;
  }

  /**
   * Set the value of creation_date
   *
   * @return  self
   */ 
  public function setCreationDate($creation_date) : int
  {
    $this->creation_date = $creation_date;

    return $this;
  }

  /**
   * Get the value of update_date
   */ 
  public function getUpdateDate() : int
  {
    return $this->update_date;
  }

  /**
   * Set the value of update_date
   *
   * @return  self
   */ 
  public function setUpdateDate($update_date) : int
  {
    $this->update_date = $update_date;

    return $this;
  }

  /**
   * Get the value of User_id_user
   */ 
  public function getIdUser() : int
  {
    return $this->User_id_user;
  }

  /**
   * Set the value of User_id_user
   *
   * @return  self
   */ 
  public function setIdUser($User_id_user) : int
  {
    $this->User_id_user = $User_id_user;

    return $this;
  }
}