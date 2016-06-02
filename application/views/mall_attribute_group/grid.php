<?php $this->load->view('layout/header');?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">商品管理 <small> 属性组管理</small></h3>
            <?php echo breadcrumb(array('mall_attribute_set/grid'=>'商品类型',  '属性组管理')); ?>
        </div>
    </div>
    <?php echo execute_alert_message() ?>
    <div class="row-fluid inbox">
        <div class="span2">
            <ul class="inbox-nav margin-bottom-10">
                <li class="compose-btn">
                    <a class="btn green" data-title="Compose" href="<?php echo base_url('mall_attribute_group/add/'.$attr_set_id);?>">
                        <i class="icon-plus"></i>添加属性组
                    </a>
                </li>
                <li class="inbox <?php if(!$this->uri->segment(3)) echo 'active';?>">
                    <a data-title="Inbox" class="btn" href="<?php echo base_url('mall_attribute_group/grid?attr_set_id='.$attr_set_id);?>">所有属性组(<?php echo count($attributeGroup);?>)</a>
                    <b></b>
                </li>
                <?php foreach($attributeGroup as $g) :?>
                <li class="draft <?php if($this->uri->segment(3)==$g->group_id) echo 'active';?>"><a data-title="Draft" href="<?php echo base_url('mall_attribute_group/grid/'.$g->group_id.'?attr_set_id='.$attr_set_id);?>" class="btn"><?php echo $g->group_name?></a><b></b></li>
                <?php endforeach;?>
            </ul>
        </div>
        <div class="span10">
            <div class="inbox-header">
                <h1 class="pull-left">属性组</h1>
               <!--   <form class="form-search pull-right" action="#">
                    <div class="input-append">
                        <input type="text" placeholder="Search Mail" class="m-wrap">
                        <button type="button" class="btn green">Search</button>
                    </div>
                </form>-->
            </div>
            <div class="inbox-content">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <?php foreach($attributeGroup as $g) :?>
                    <?php if($this->uri->segment(3)==$g->group_id) :?>
                        <tr style="height:50px;">
                            <td>组编号：</td>
                            <td><?php echo $g->group_id;?></td>
                            <td>商品属性ID：</td>
                            <td><?php echo $g->attr_set_id;?></td>
                            <td>组名称：</td>
                            <td><?php echo $g->group_name;?></td>
                            <td>排序：</td>
                            <td><?php echo $g->sort;?></td>
                            <td colspan="3">
                                <a class="btn mini green" href="<?php echo base_url('mall_attribute_group/delete/'.$g->group_id.'?attr_set_id='.$attr_set_id); ?>" onclick="return confirm('确定要删除属性组？')"><i class="icon-trash"></i>删除</a> 
                                <a class="btn mini green" href="<?php echo base_url('mall_attribute_value/add/'.$g->group_id.'?attr_set_id='.$attr_set_id); ?>" ><i class="icon-plus"></i>新增属性值</a> 
                            </td>
                        </tr>
                        <?php endif;?>
                        <?php endforeach;?>
                    </thead>
                    <tbody>
                    <tr>
                        <th>编号</th>
                        <th>组号</th>
                        <th>商品属性ID</th>
                        <th>属性名称</th>
                        <th>属性类型</th>
                        <th>属性值</th>
                        <th>是否必须</th>
                        <th>索引</th>
                        <th>是否关联相同属性值商品</th>
                        <th>排序</th>
                        <th>操作</th>
                    </tr>
                    <?php ?>
                    <?php foreach($attributeValue as $v) :?>
                    <tr style="border:1px solid #ddd;">
                        <td><?php echo $v->attr_value_id?></td>
                        <td><?php echo $v->group_id?></td>
                        <td><?php echo $v->attr_set_id?></td>
                        <td><?php echo $v->attr_name?></td>
                        <td><?php echo $v->attr_type?></td>
                        <td><?php echo $v->attr_values?></td>
                        <td><?php if($v->values_required==1) echo '必填';?></td>
                        <td><?php if($v->attr_index==2)echo '关键字检索';?></td>
                        <td><?php if($v->is_linked==1)echo '关联'?></td>
                        <td><?php echo $v->sort_order?></td>
                        <td>
                            <a class="btn mini green" href="<?php echo base_url('mall_attribute_value/delete/'.$v->attr_value_id.'?attr_set_id='.$attr_set_id); ?>" onclick="return confirm('确定要删除属性？')"><i class="icon-trash"></i>删除</a> 
                            <a class="btn mini green" href="<?php echo base_url('mall_attribute_value/edit/'.$v->attr_value_id.'?attr_set_id='.$attr_set_id); ?>"><i class="icon-edit"></i>编辑属性</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layout/footer');?>