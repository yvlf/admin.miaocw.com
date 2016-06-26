<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mall_brand extends MJ_Controller {

	public function _init()
	{
	    $this->load->library('pagination');
	    $this->load->model('mall_brand_model','mall_brand');
	}

    public function grid($pg = 1)
	{
	    $getData = $this->input->get();
	    $page_num = 20;
		$num = ($pg-1)*$page_num;
	    $config['first_url']   = base_url('mall_brand/grid').$this->pageGetParam($this->input->get());
	    $config['suffix']      = $this->pageGetParam($this->input->get());
	    $config['base_url']    = base_url('mall_brand/grid');
	    $config['total_rows']  = $this->mall_brand->total($getData);
	    $config['uri_segment'] = 3; 
	    $this->pagination->initialize($config);
	    $data['pg_link']   = $this->pagination->create_links();
	    $data['res_list'] = $this->mall_brand->page_list($page_num, $num, $getData);
	    $data['all_rows']  = $config['total_rows'];
	    $data['pg_now']    = $pg;
		$data['page_num'] = $page_num;
	    $this->load->view('mall_brand/grid', $data);
	}
	
	public function add()
	{
	    $this->load->view('mall_brand/add');
	}
	
	public function addPost()
	{
	    $error = $this->validate(); 
	    if (!empty($error))
	    {
	        $this->error('mall_brand/add', '', $error);
	    }
	    $postData = $this->input->post();
	    if(!empty($_FILES['brand_logo']['name'])){
	    	$brand_logo = $this->dealWithImages('brand_logo', '', 'brand');
	    	$data['brand_logo'] = $brand_logo['file_name'];
	    }
	    if(!empty($_FILES['brand_author']['name'])){
	    	$brand_author = $this->dealWithImages('brand_author', '', 'brand');
	    	$data['brand_author'] = $brand_author['file_name'];
	    }
	    $data['brand_name'] = $postData['brand_name'];
	    $data['brand_desc'] = $postData['brand_desc'];
	    $data['site_url'] = $postData['site_url'];
	    $data['is_show'] = $postData['is_show'];
	    $data['sort_order'] = $postData['sort_order'];
	    $res = $this->mall_brand->insert($data);
	    if ($res) {
	        $this->success('mall_brand/grid', '', '新增成功！');
	    } else {
	        $this->error('mall_brand/add', '', '新增失败！');
	    }
	}
	
	public function edit($brand_id)
	{
	    $res = $this->mall_brand->findById($brand_id);
	    if ($res->num_rows() <= 0){
	    	$this->error('mall_brand/grid', '', '无法找到该ID结果值');
	    } 
	    $data['res'] = $res->row();
	    $this->load->view('mall_brand/edit',$data);
	}
	
	public function editPost()
	{
	    $error = $this->validate();
        if (!empty($error))
        {
            $this->error('mall_brand/edit', $this->input->post('brand_id'), $error);
        }
        $postData = $this->input->post();
        $brand_logo = '';
        if (!empty($_FILES['brand_logo']['name'])) {
        	$brand_logo = $this->dealWithImages('brand_logo', $postData['old_brand_logo'], 'brand'); 
        	$data['brand_logo'] = $brand_logo['file_name'];
        }
        if (!empty($_FILES['brand_author']['name'])) {
        	$brand_author = $this->dealWithImages('brand_author', $postData['old_brand_author'], 'brand');
        	$data['brand_author'] = $brand_author['file_name'];
        }
	    $data['brand_name'] = $postData['brand_name'];
	    $data['brand_desc'] = $postData['brand_desc'];
	    $data['site_url'] = $postData['site_url'];
	    $data['is_show'] = $postData['is_show'];
	    $data['sort_order'] = $postData['sort_order'];
        $res = $this->mall_brand->update(array('brand_id'=>$postData['brand_id']), $data);  
        if ($res) {
            $this->success('mall_brand/grid', '', '修改成功！');
        } else {
            $this->error('mall_brand/edit', $this->input->post('brand_id'), '修改失败！');
        }
	}
	
	public function delete($brand_id)
	{
	    $brand = $this->mall_brand->findById($brand_id);
	    $logo = $brand->num_rows()>0 ? $brand->row()->brand_logo : '';
	    if (!empty($logo) && file_exists($this->config->upload_image_path('brand', $logo))) {
	        @unlink($this->config->upload_image_path('brand', $logo));
	    }
        $is_delete = $this->mall_brand->delete(array('brand_id'=>$brand_id));
        if ($is_delete) {
            $this->success('mall_brand/grid', '', '删除成功！');
        } else {
            $this->error('mall_brand/grid', '', '删除失败！');
        }
	    
	}
	
	public function validate()
	{
	    $error = array();
        if ($this->validateParam($this->input->post('brand_name')))
        {
            $error[] = '品牌名称不能为空';
        }
	    return $error;
	}
	
}
/** End of file Mall_brand.php */
/** Location: ./application/controllers/Mall_brand.php */
