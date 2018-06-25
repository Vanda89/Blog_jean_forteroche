<?php

class CommentsModel
{
  private $author;
  private $status;
  private $comment_content;
  private $comment_date;
  private $comment_reported;
  private $update_date;
  private $Posts_id_post;
  private $User_id_user;

  /**
   * Get the value of author
   */ 
  public function getAuthor() : string
  {
    return $this->author;
  }

  /**
   * Set the value of author
   *
   * @return  self
   */ 
  public function setAuthor($author) : string
  {
    $this->author = $author;

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
   * Get the value of comment_content
   */ 
  public function getCommentContent() : string
  {
    return $this->comment_content;
  }

  /**
   * Set the value of comment_content
   *
   * @return  self
   */ 
  public function setCommentContent($comment_content) : string
  {
    $this->comment_content = $comment_content;

    return $this;
  }

  /**
   * Get the value of comment_date
   */ 
  public function getCommentDate() : int
  {
    return $this->comment_date;
  }

  /**
   * Set the value of comment_date
   *
   * @return  self
   */ 
  public function setCommentDate($comment_date) : int
  {
    $this->comment_date = $comment_date;

    return $this;
  }

  /**
   * Get the value of comment_reported
   */ 
  public function getCommentReported() : int
  {
    return $this->comment_reported;
  }

  /**
   * Set the value of comment_reported
   *
   * @return  self
   */ 
  public function setCommentReported($comment_reported) : int
  {
    $this->comment_reported = $comment_reported;

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
   * Get the value of Posts_id_post
   */ 
  public function getPostsIdPost() : int
  {
    return $this->Posts_id_post;
  }

  /**
   * Set the value of Posts_id_post
   *
   * @return  self
   */ 
  public function setPostsIdPost($Posts_id_post) : int
  {
    $this->Posts_id_post = $Posts_id_post;

    return $this;
  }

  /**
   * Get the value of User_id_user
   */ 
  public function getUserIdUser() : int
  {
    return $this->User_id_user;
  }

  /**
   * Set the value of User_id_user
   *
   * @return  self
   */ 
  public function setUserIdUser($User_id_user) : int
  {
    $this->User_id_user = $User_id_user;

    return $this;
  }
}