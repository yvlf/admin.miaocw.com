<?php $this->load->view('layout/header'); ?>
<div class="container-fluid mall-goods-add-step2">
    <div class="row-fluid">
        <div class="span12">
            <h3 class="page-title">趣网商城 <small>商品添加</small></h3>
            <?php echo breadcrumb(array('mall_goods/grid' => '趣网产品', '编辑商品')); ?>
        </div>
    </div>
    <div class="alert alert-error" style="display:none;">
        <button data-dismiss="alert" class="close"></button>
        <a href="javascript:;" class="glyphicons no-js remove_2"><i></i><p></p></a>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-plus-sign"></i>编辑商品</div>
                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                        <a class="remove" href="javascript:;"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal mall-goods-form" action="<?php echo base_url('mall_goods/addPost') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="goods_id" value="<?php echo $mallgoods->goods_id;?>">
                        <div class="alert alert-success">商品基本信息</div>
                        <div class="control-group">
                            <label class="control-label">商品分类</label>
                            <div class="controls">
                                 <input type="text" class="m-wrap span8" name="cat_name" value="<?php echo $mallgoods->full_name;?>"  disabled="disabled"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>商品类别</label>
                            <div class="controls">
                                <select name="extension_code" class="medium m-wrap valid" disabled="disabled">
                                    <?php foreach ($extension as $key=>$value) : ?>
                                        <option value="<?php echo $key;?>" <?php if($key==$mallgoods->extension_code):?>selected="selected"<?php endif;?>><?php echo $value; ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>商品类型</label>
                            <div class="controls">
                                <select name="attribute_set_id" class="medium m-wrap valid" disabled="disabled">
                                    <?php foreach ($attribute->result() as $key=>$value) : ?>
                                        <option value="<?php echo $value->attr_set_id;?>" <?php if($value->attr_set_id==$mallgoods->attribute_set_id):?>selected="selected"<?php endif;?>><?php echo $value->attr_set_name;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>商品名称</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span8 required" placeholder="商品名称" name="goods_name" value="<?php echo $mallgoods->goods_name;?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>商品编号</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span8 required" placeholder="商品编号" name="goods_sku" value="<?php echo $mallgoods->goods_sku;?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">商品品牌</label>
                            <div class="controls">
                                <select name="brand_id" class="m-wrap span8">
                                    <option value="0">请选择</option>
                                    <?php if ($brand->num_rows() > 0) : ?>
                                        <?php foreach ($brand->result() as $item) : ?>
                                            <option value="<?php echo $item->brand_id ?>" <?php if($item->brand_id==$mallgoods->brand_id):?>selected="selected"<?php endif;?>><?php echo $item->brand_name ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label"><em>* </em>净重（kg）</label>
                            <div class="controls">
                                <input type="text" name="goods_weight" class="m-wrap span8 required number" placeholder="重量(kg)" value="<?php echo $mallgoods->goods_weight;?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>商品简介</label>
                            <div class="controls">
                                <textarea name="goods_brief" rows="3" class="m-wrap span8 required"><?php echo $mallgoods->goods_brief;?></textarea>
                            </div>
                        </div>
                        <div class="control-group add-supplieruid-html">
                            <label class="control-label"><em>* </em>供应商</label>
                            <div class="controls">
                                <input type="text" name="supplier_id" placeholder="供应商UID" value="<?php echo $mallgoods->supplier_id;?>" class="m-wrap span8 supplieruid required tooltips" data-original-title="双击可弹框选择供应商；直接输入‘用户名称或编号’可提示" data-trigger="hover">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>审核状态</label>
                            <div class="controls">
                                <select class="m-wrap span8 number required" name="is_check">
                                    <option value="1" <?php if(1==$mallgoods->is_check):?>selected="selected"<?php endif;?>>未审核</option>
                                    <option value="2" <?php if(2==$mallgoods->is_check):?>selected="selected"<?php endif;?>>审核通过</option>
                                    <option value="3" <?php if(3==$mallgoods->is_check):?>selected="selected"<?php endif;?>>审核拒绝</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>上下架</label>
                            <div class="controls">
                                <select class="m-wrap span8 required" name="is_on_sale">
                                    <option value="1" <?php if(1==$mallgoods->is_on_sale):?>selected="selected"<?php endif;?>>上架</option>
                                    <option value="2" <?php if(2==$mallgoods->is_on_sale):?>selected="selected"<?php endif;?>>下架</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>pc商品详情</label>
                            <div class="controls">
                                <textarea name="goods_desc" rows="3" class="textarea-multipart-edit m-wrap span8 required"><?php echo $mallgoods->goods_desc;?></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>wap商品详情</label>
                            <div class="controls">
                                <textarea name="wap_goods_desc" rows="3" class="textarea-multipart-edit m-wrap span8 required"><?php echo $mallgoods->wap_goods_desc;?></textarea>
                            </div>
                        </div>
                        <div class="alert alert-success">商品销售信息</div>
                        <div class="control-group ">
                            <label class="control-label">市场价格</label>
                            <div class="controls">
                                <input type="text" name="market_price" class="m-wrap span8 required number" placeholder="市场价格" value="<?php echo $mallgoods->market_price;?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>供应价</label>
                            <div class="controls">
                                <input type="text" name="shop_price" class="m-wrap span8 required number" placeholder="供应价" value="<?php echo $mallgoods->shop_price;?>">
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label"><em>* </em>促销价</label>
                            <div class="controls">
                                <input type="text" name="promote_price" class="m-wrap span8 required number" placeholder="促销价" value="<?php echo $mallgoods->promote_price;?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>购买频率限制</label>
                            <div class="controls">
                            	<label class="radio">
                                	<input type="radio" class="m-wrap required" name="booking_limit" value="0" <?php if(0==$mallgoods->booking_limit):?>checked="checked"<?php endif;?>/>不限
                                </label>
                                <label class="radio">
                                	<input type="radio" class="m-wrap required" name="booking_limit" value="1" <?php if(1==$mallgoods->booking_limit):?>checked="checked"<?php endif;?>/>天
                                </label>
                                <label class="radio">
                                	<input type="radio" class="m-wrap required" name="booking_limit" value="2" <?php if(2==$mallgoods->booking_limit):?>checked="checked"<?php endif;?>/>周
                                </label>
                                <label class="radio">
                                	<input type="radio" class="m-wrap required" name="booking_limit" value="3" <?php if(3==$mallgoods->booking_limit):?>checked="checked"<?php endif;?>/>月
                                </label>	
                                <label class="radio">
                                	<input type="radio" class="m-wrap required" name="booking_limit" value="4" <?php if(4==$mallgoods->booking_limit):?>checked="checked"<?php endif;?>/>年
                                </label>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label"><em>* </em>限制购买数量</label>
                            <div class="controls">
                                <input type="text" name="limit_num" class="m-wrap span8 required" placeholder="限制购买数量 ,0代表不限制" value="<?php echo $mallgoods->booking_limit;?>">
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label"><em>* </em>促销开始时间</label>
                            <div class="controls">
                                <input type="text" name="promote_start_date" class="m-wrap span8 required date-picker date" placeholder="促销开始时间" value="<?php echo date('Y-m-d',strtotime($mallgoods->promote_start_date));?>">
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label"><em>* </em>促销结束时间</label>
                            <div class="controls">
                                <input type="text" name="promote_end_date" class="m-wrap span8 required date-picker date" placeholder="促销结束时间" value="<?php echo date('Y-m-d',strtotime($mallgoods->promote_end_date));?>">
                            </div>
                        </div>
                        <div class="control-group ">
                           <label class="control-label"><em>* </em>用户积分</label>
                           <div class="controls">
                                <input type="text" name="integral" class="m-wrap span8 required number" placeholder="100积分抵1块钱,0代表不抵，不使用"  value="<?php echo $mallgoods->integral;?>"/>
                           </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>减库存方式</label>
                            <div class="controls">
                            	<label class="radio">
                                	<input type="radio" class="m-wrap required" name="minus_stock" value="1" <?php if(1==$mallgoods->minus_stock):?>checked="checked"<?php endif;?>/>拍下减库存
                                </label>
                                <label class="radio">
                                	<input type="radio" class="m-wrap required" name="minus_stock" value="2" <?php if(2==$mallgoods->minus_stock):?>checked="checked"<?php endif;?>/>付款减库存
                                </label>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label"><em>* </em>浏览量</label>
                            <div class="controls">
                                <input type="text" name="tour_count" class="m-wrap span8 required number" placeholder="浏览量" value="<?php echo $mallgoods->tour_count;?>">
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label"><em>* </em>销售数量</label>
                            <div class="controls">
                                <input type="text" name="sale_count" class="m-wrap span8 required number" placeholder="销售数量" value="<?php echo $mallgoods->sale_count;?>">
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label"><em>* </em>库存</label>
                            <div class="controls">
                                <input type="text" name="in_stock" class="m-wrap span8 required number" placeholder="库存" value="<?php echo $mallgoods->in_stock;?>">
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label"><em>* </em>排序</label>
                            <div class="controls">
                                <input type="text" name="sort_order" class="m-wrap span8 required number" placeholder="排序" value="<?php echo $mallgoods->sort_order;?>">
                            </div>
                        </div>
                        
                        <?php if(count($attr_value) || count($attr_price)) :?>
                        <div class="alert alert-success">商品属性：</div>
                        <?php if(count($attr_value)) :?> <!-- 还在做 -->
                        <?php foreach($attr_value as $value) :?>
                        <div class="control-group ">
                            <label class="control-label"><?php if($attribute[$price->attr_value_id]->values_required==1):?><em>*</em><?php endif;?> <?php echo $attribute[$price->attr_value_id]->attr_name;?></label>
                            <div class="controls">
                                <?php if($attribute[$price->attr_value_id]->attr_type=='text'):?>
                                <input type="text" name="" class="m-wrap span8 <?php if($attribute[$price->attr_value_id]->values_required==1):?>required<?php endif;?>" placeholder="<?php echo $item->attr_name;?>" attr_value_id="<?php echo $item->attr_value_id;?>">
                                <?php endif;?>
                                <?php if($attribute[$price->attr_value_id]->attr_type=='textarea'):?>
                                <textarea name="" rows="3" class="m-wrap span8 <?php if($attribute[$price->attr_value_id]->values_required==1):?>required<?php endif;?>" placeholder="<?php echo $item->attr_name;?>"></textarea>
                                <?php endif;?>
                                <?php if($attribute[$price->attr_value_id]->attr_type=='date'):?>
                                <input type="text" name="" class="m-wrap span8 date-picker <?php if($attribute[$price->attr_value_id]->values_required==1):?>required<?php endif;?>" placeholder="<?php echo $item->attr_name;?>" attr_value_id="<?php echo $item->attr_value_id;?>">
                                <?php endif;?>
                                <?php if($attribute[$price->attr_value_id]->attr_type=='boolean'):?>
                                <label class="radio">
                            	  	<input type="radio" class="m-wrap <?php if($attribute[$price->attr_value_id]->values_required==1):?>required<?php endif;?>" name="" value="1" checked="checked"/>是
                            	</label>
                                <label class="radio">
                                	<input type="radio" class="m-wrap <?php if($attribute[$price->attr_value_id]->values_required==1):?>required<?php endif;?>" name="" value="0"/>否
                                </label>
                                <?php endif;?>
                            </div>
                        </div>
                        <?php endforeach;?>
                        <?php endif;?>
                        <?php if(count($attr_price)) :?>
                        <div class="control-group ">
                            <label class="control-label">属性价格表</label>
                            <div class="controls">
                                <table class="table span8 table-striped table-bordered table-hover" style="margin-top: -30px;">
                                <tr>
                                <td class="span3">属性值</td>
                                <td class="span3">价格 </td>
                                <td class="span3">属性数量 </td>
                                <td class="span3">库存数量 </td>
                                <td class="span3">操作</td>
                                </tr>
                                <?php foreach ($attr_price as $price):?>
                                <tr>
	                                <td>
                                        <?php if($attribute_value[$price->attr_value_id]->values_required==1):?><em>*</em><?php endif;?><input type="text" style="width:auto;" name="" disabled value="<?php echo $price->attr_value;?>" />
                                    </td>
                                    <td>
                                        <input type="text" style="width:auto;" name="price[<?php echo $price->attr_price_id;?>]" class="number <?php if($attribute_value[$price->attr_value_id]->values_required==1):?>required<?php endif;?>" placeholder="价格" value="<?php echo $price->attr_price;?>" title="请输入价格"  >
                                    </td> 
                                    <td>   
                                        <input type="text" style="width:auto;" name="attrNum[<?php echo $price->attr_price_id;?>]" class="number <?php if($attribute_value[$price->attr_value_id]->values_required==1):?>required<?php endif;?>" placeholder="属性数量" value="<?php echo $price->attr_num;?>" title="请输入属性数量"  >
                                    </td>
                                    <td>    
                                        <input type="text" style="width:auto;" name="attrStock[<?php echo $price->attr_price_id;?>]" class="number <?php if($attribute_value[$price->attr_value_id]->values_required==1):?>required<?php endif;?>" placeholder="库存数量" value="<?php echo $price->attr_stock;?>" title="请输入库存数量"  >
                                    </td>
                                    <td><a class="btn mini green" <?php if($attribute_value[$price->attr_value_id]->values_required==1)echo 'disabled';?> data-attr_price_id="<?php echo $price->attr_price_id;?>">删除</a></td>
                                </tr>
                                <?php endforeach;?>
                                </table>
                            </div>
                        </div>
                        <?php endif;?>
                        <?php endif;?>
                        
                        <div class="alert alert-success">商品运费信息</div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>配送地址</label>
                            <div class="controls">
                                <?php $this->load->view('commonhtml/districtSelect'); ?>
                            </div>
                        </div>
                        <div class="control-group ">
                            <label class="control-label"> 详细地址</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span8 required" placeholder="用于根据地址搜索您的产品" name="address" value="<?php echo trim(mb_strrchr($mallgoods->address, ' ')); ?>" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><em>* </em>支付方式</label>
                            <div class="controls">
                                <label class="checkbox">
                                    <input type="checkbox" class="required" value="1" name="payments[]" checked="checked"/>在线支付
                                </label>
                                <label class="checkbox">
                                    <input type="checkbox" class="required" value="2" name='payments[]'/>货到付款
                                </label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">运费</label>
                            <div class="controls transport">
                                <label class="checkbox">
                                    <input type="radio" class="required" value="1" name="transport_type" <?php if($mallgoods->freight_id>0):?>checked="checked"<?php endif;?>/>
                                </label>
                                <select name="freight_id" id="freight_id" class="medium required" <?php if($mallgoods->freight_id==0):?>style="display:none;"<?php endif;?>>
                                    <?php if($freight->num_rows()>0):?>
                                    <?php foreach($freight->result() as $item):?>
                                    <option value="<?php echo $item->freight_id;?>" <?php if($item->freight_id==$mallgoods->freight_id):?>selected="selected"<?php endif;?>><?php echo $item->name;?></option>  
                                    <?php endforeach;?>
                                    <?php endif;?>
                                </select>
                                <label class="checkbox">使用运费模板</label>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"></label>
                            <div class="controls transport">
                                <label class="checkbox">
                                    <input type="radio" class="required" value="2" name="transport_type" <?php if($mallgoods->freight_id==0):?>checked="checked"<?php endif;?>/>
                                </label>
                                <input type="text" name="freight_cost" id="freight_cost" class="required" <?php if($mallgoods->freight_id>0):?>style="display:none;" <?php endif;?> value="<?php echo $mallgoods->freight_cost;?>" />
                                <label class="checkbox">自定义运费价格</label>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button class="btn green step4" type="submit"><i class="icon-ok"></i> 保存</button>
                            <a class="btn step3" href="<?php echo base_url('mall_goods/addstep1')?>">返回上一步</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layout/footer'); ?>
<?php $this->load->view('user/addSupplierUid/ajaxGetUser'); ?>
<script type="text/javascript">
$(document).ready(function(){
    $('.mall-goods-add-step2').on("click", "input[name='transport_type']", function () {
        var obj = $(this).parents('label').next();
        var uid = $('input[name=supplier_id]').val();
        var key = $(this).attr('data-key');
        if (uid == '') {
            alert('请先填写供应商');
        } else {
            if (obj[0].tagName == 'SELECT') {
                $('#freight_cost').hide();
            } else {
                $('#freight_id').hide();
            }
            obj.show();
            $.ajax({
                type: 'post',
                async: true,
                dataType: 'json',
                url: hostUrl() + '/mall_freight/ajaxGetTransport',
                data: {uid: uid},
                success: function (data) {
                    if (data) {
                        var transportObj = document.getElementById('freight_id');
                        var len = data.length;
                        transportObj.options.length = 0;
                        for (var i = 0; i < data.length; i++) {
                            transportObj.options[i] = new Option(data[i].name, data[i].freight_id);
                            if (key == data[i].freight_id) {
                                transportObj.selectedIndex = key;
                            }
                        }
                    }
                }
            });
        }
    });

    // 提交验证
    $('form.mall-goods-form').submit(function () {
        return false;
    }).validate({
        submitHandler: function (f) {
            $.ajax({
                type: 'post',
                async: true,
                dataType: 'json',
                url: hostUrl() + '/mall_goods/ajaxValidate',
                data: $('form.mall-goods-form').serialize(),
                success: function (data) {
                    if (data.status) {
                        $('.alert-error').hide();
                        window.location.href = data.messages;
                    } else {
                        $('.alert-error').show();
                        $('.alert-error .remove_2 p').html(data.messages);
                        var body = (window.opera) ? (document.compatMode == 'CSS1Compat' ? $('html') : $('body')) : $('html,body');
                        body.animate({scrollTop: $('.page-container').offset().top}, 1000);
                    }
                }
            });
        }
    });
});
</script>