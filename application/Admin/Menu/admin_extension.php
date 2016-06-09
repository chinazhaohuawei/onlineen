<?php
return array (
  'app' => 'Admin',
  'model' => 'Extension',
  'action' => 'default',
  'data' => '',
  'type' => '0',
  'status' => '1',
  'name' => '扩展工具',
  'icon' => 'cloud',
  'remark' => '',
  'listorder' => '40',
  'children' => 
  array (
    array (
      'app' => 'Admin',
      'model' => 'Backup',
      'action' => 'default',
      'data' => '',
      'type' => '1',
      'status' => '1',
      'name' => '备份管理',
      'icon' => '',
      'remark' => '',
      'listorder' => '0',
      'children' => 
      array (
        array (
          'app' => 'Admin',
          'model' => 'Backup',
          'action' => 'restore',
          'data' => '',
          'type' => '1',
          'status' => '1',
          'name' => '数据还原',
          'icon' => '',
          'remark' => '',
          'listorder' => '0',
        ),
        array (
          'app' => 'Admin',
          'model' => 'Backup',
          'action' => 'index',
          'data' => '',
          'type' => '1',
          'status' => '1',
          'name' => '数据备份',
          'icon' => '',
          'remark' => '',
          'listorder' => '0',
          'children' => 
          array (
            array (
              'app' => 'Admin',
              'model' => 'Backup',
              'action' => 'index_post',
              'data' => '',
              'type' => '1',
              'status' => '0',
              'name' => '提交数据备份',
              'icon' => '',
              'remark' => '',
              'listorder' => '0',
            ),
          ),
        ),
        array (
          'app' => 'Admin',
          'model' => 'Backup',
          'action' => 'download',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '下载备份',
          'icon' => '',
          'remark' => '',
          'listorder' => '1000',
        ),
        array (
          'app' => 'Admin',
          'model' => 'Backup',
          'action' => 'del_backup',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '删除备份',
          'icon' => '',
          'remark' => '',
          'listorder' => '1000',
        ),
        array (
          'app' => 'Admin',
          'model' => 'Backup',
          'action' => 'import',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '数据备份导入',
          'icon' => '',
          'remark' => '',
          'listorder' => '1000',
        ),
      ),
    ),
    array (
      'app' => 'Admin',
      'model' => 'Plugin',
      'action' => 'index',
      'data' => '',
      'type' => '1',
      'status' => '1',
      'name' => '插件管理',
      'icon' => '',
      'remark' => '',
      'listorder' => '0',
      'children' => 
      array (
        array (
          'app' => 'Admin',
          'model' => 'Plugin',
          'action' => 'toggle',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '插件启用切换',
          'icon' => '',
          'remark' => '',
          'listorder' => '0',
        ),
        array (
          'app' => 'Admin',
          'model' => 'Plugin',
          'action' => 'setting',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '插件设置',
          'icon' => '',
          'remark' => '',
          'listorder' => '0',
          'children' => 
          array (
            array (
              'app' => 'Admin',
              'model' => 'Plugin',
              'action' => 'setting_post',
              'data' => '',
              'type' => '1',
              'status' => '0',
              'name' => '插件设置提交',
              'icon' => '',
              'remark' => '',
              'listorder' => '0',
            ),
          ),
        ),
        array (
          'app' => 'Admin',
          'model' => 'Plugin',
          'action' => 'install',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '插件安装',
          'icon' => '',
          'remark' => '',
          'listorder' => '0',
        ),
        array (
          'app' => 'Admin',
          'model' => 'Plugin',
          'action' => 'uninstall',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '插件卸载',
          'icon' => '',
          'remark' => '',
          'listorder' => '0',
        ),
        array (
          'app' => 'Admin',
          'model' => 'Plugin',
          'action' => 'update',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '插件更新',
          'icon' => '',
          'remark' => '',
          'listorder' => '0',
        ),
      ),
    ),
    array (
      'app' => 'Admin',
      'model' => 'Storage',
      'action' => 'index',
      'data' => '',
      'type' => '1',
      'status' => '1',
      'name' => '文件存储',
      'icon' => '',
      'remark' => '',
      'listorder' => '0',
      'children' => 
      array (
        array (
          'app' => 'Admin',
          'model' => 'Storage',
          'action' => 'setting_post',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '文件存储设置提交',
          'icon' => '',
          'remark' => '',
          'listorder' => '0',
        ),
      ),
    ),
    array (
      'app' => 'Admin',
      'model' => 'Slide',
      'action' => 'default',
      'data' => '',
      'type' => '1',
      'status' => '1',
      'name' => '幻灯片',
      'icon' => '',
      'remark' => '',
      'listorder' => '1',
      'children' => 
      array (
        array (
          'app' => 'Admin',
          'model' => 'Slide',
          'action' => 'index',
          'data' => '',
          'type' => '1',
          'status' => '1',
          'name' => '幻灯片管理',
          'icon' => '',
          'remark' => '',
          'listorder' => '0',
          'children' => 
          array (
            array (
              'app' => 'Admin',
              'model' => 'Slide',
              'action' => 'listorders',
              'data' => '',
              'type' => '1',
              'status' => '0',
              'name' => '幻灯片排序',
              'icon' => '',
              'remark' => '',
              'listorder' => '0',
            ),
            array (
              'app' => 'Admin',
              'model' => 'Slide',
              'action' => 'toggle',
              'data' => '',
              'type' => '1',
              'status' => '0',
              'name' => '幻灯片显示切换',
              'icon' => '',
              'remark' => '',
              'listorder' => '0',
            ),
            array (
              'app' => 'Admin',
              'model' => 'Slide',
              'action' => 'ban',
              'data' => '',
              'type' => '1',
              'status' => '0',
              'name' => '禁用幻灯片',
              'icon' => '',
              'remark' => '',
              'listorder' => '0',
            ),
            array (
              'app' => 'Admin',
              'model' => 'Slide',
              'action' => 'cancelban',
              'data' => '',
              'type' => '1',
              'status' => '0',
              'name' => '启用幻灯片',
              'icon' => '',
              'remark' => '',
              'listorder' => '0',
            ),
            array (
              'app' => 'Admin',
              'model' => 'Slide',
              'action' => 'delete',
              'data' => '',
              'type' => '1',
              'status' => '0',
              'name' => '删除幻灯片',
              'icon' => '',
              'remark' => '',
              'listorder' => '1000',
            ),
            array (
              'app' => 'Admin',
              'model' => 'Slide',
              'action' => 'edit',
              'data' => '',
              'type' => '1',
              'status' => '0',
              'name' => '编辑幻灯片',
              'icon' => '',
              'remark' => '',
              'listorder' => '1000',
              'children' => 
              array (
                array (
                  'app' => 'Admin',
                  'model' => 'Slide',
                  'action' => 'edit_post',
                  'data' => '',
                  'type' => '1',
                  'status' => '0',
                  'name' => '提交编辑',
                  'icon' => '',
                  'remark' => '',
                  'listorder' => '0',
                ),
              ),
            ),
            array (
              'app' => 'Admin',
              'model' => 'Slide',
              'action' => 'add',
              'data' => '',
              'type' => '1',
              'status' => '0',
              'name' => '添加幻灯片',
              'icon' => '',
              'remark' => '',
              'listorder' => '1000',
              'children' => 
              array (
                array (
                  'app' => 'Admin',
                  'model' => 'Slide',
                  'action' => 'add_post',
                  'data' => '',
                  'type' => '1',
                  'status' => '0',
                  'name' => '提交添加',
                  'icon' => '',
                  'remark' => '',
                  'listorder' => '0',
                ),
              ),
            ),
          ),
        ),
        array (
          'app' => 'Admin',
          'model' => 'Slidecat',
          'action' => 'index',
          'data' => '',
          'type' => '1',
          'status' => '1',
          'name' => '幻灯片分类',
          'icon' => '',
          'remark' => '',
          'listorder' => '0',
          'children' => 
          array (
            array (
              'app' => 'Admin',
              'model' => 'Slidecat',
              'action' => 'delete',
              'data' => '',
              'type' => '1',
              'status' => '0',
              'name' => '删除分类',
              'icon' => '',
              'remark' => '',
              'listorder' => '1000',
            ),
            array (
              'app' => 'Admin',
              'model' => 'Slidecat',
              'action' => 'edit',
              'data' => '',
              'type' => '1',
              'status' => '0',
              'name' => '编辑分类',
              'icon' => '',
              'remark' => '',
              'listorder' => '1000',
              'children' => 
              array (
                array (
                  'app' => 'Admin',
                  'model' => 'Slidecat',
                  'action' => 'edit_post',
                  'data' => '',
                  'type' => '1',
                  'status' => '0',
                  'name' => '提交编辑',
                  'icon' => '',
                  'remark' => '',
                  'listorder' => '0',
                ),
              ),
            ),
            array (
              'app' => 'Admin',
              'model' => 'Slidecat',
              'action' => 'add',
              'data' => '',
              'type' => '1',
              'status' => '0',
              'name' => '添加分类',
              'icon' => '',
              'remark' => '',
              'listorder' => '1000',
              'children' => 
              array (
                array (
                  'app' => 'Admin',
                  'model' => 'Slidecat',
                  'action' => 'add_post',
                  'data' => '',
                  'type' => '1',
                  'status' => '0',
                  'name' => '提交添加',
                  'icon' => '',
                  'remark' => '',
                  'listorder' => '0',
                ),
              ),
            ),
          ),
        ),
      ),
    ),
    array (
      'app' => 'Admin',
      'model' => 'Ad',
      'action' => 'index',
      'data' => '',
      'type' => '1',
      'status' => '1',
      'name' => '网站广告',
      'icon' => '',
      'remark' => '',
      'listorder' => '2',
      'children' => 
      array (
        array (
          'app' => 'Admin',
          'model' => 'Ad',
          'action' => 'toggle',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '广告显示切换',
          'icon' => '',
          'remark' => '',
          'listorder' => '0',
        ),
        array (
          'app' => 'Admin',
          'model' => 'Ad',
          'action' => 'delete',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '删除广告',
          'icon' => '',
          'remark' => '',
          'listorder' => '1000',
        ),
        array (
          'app' => 'Admin',
          'model' => 'Ad',
          'action' => 'edit',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '编辑广告',
          'icon' => '',
          'remark' => '',
          'listorder' => '1000',
          'children' => 
          array (
            array (
              'app' => 'Admin',
              'model' => 'Ad',
              'action' => 'edit_post',
              'data' => '',
              'type' => '1',
              'status' => '0',
              'name' => '提交编辑',
              'icon' => '',
              'remark' => '',
              'listorder' => '0',
            ),
          ),
        ),
        array (
          'app' => 'Admin',
          'model' => 'Ad',
          'action' => 'add',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '添加广告',
          'icon' => '',
          'remark' => '',
          'listorder' => '1000',
          'children' => 
          array (
            array (
              'app' => 'Admin',
              'model' => 'Ad',
              'action' => 'add_post',
              'data' => '',
              'type' => '1',
              'status' => '0',
              'name' => '提交添加',
              'icon' => '',
              'remark' => '',
              'listorder' => '0',
            ),
          ),
        ),
      ),
    ),
    array (
      'app' => 'Admin',
      'model' => 'Link',
      'action' => 'index',
      'data' => '',
      'type' => '0',
      'status' => '1',
      'name' => '友情链接',
      'icon' => '',
      'remark' => '',
      'listorder' => '3',
      'children' => 
      array (
        array (
          'app' => 'Admin',
          'model' => 'Link',
          'action' => 'listorders',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '友情链接排序',
          'icon' => '',
          'remark' => '',
          'listorder' => '0',
        ),
        array (
          'app' => 'Admin',
          'model' => 'Link',
          'action' => 'toggle',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '友链显示切换',
          'icon' => '',
          'remark' => '',
          'listorder' => '0',
        ),
        array (
          'app' => 'Admin',
          'model' => 'Link',
          'action' => 'delete',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '删除友情链接',
          'icon' => '',
          'remark' => '',
          'listorder' => '1000',
        ),
        array (
          'app' => 'Admin',
          'model' => 'Link',
          'action' => 'edit',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '编辑友情链接',
          'icon' => '',
          'remark' => '',
          'listorder' => '1000',
          'children' => 
          array (
            array (
              'app' => 'Admin',
              'model' => 'Link',
              'action' => 'edit_post',
              'data' => '',
              'type' => '1',
              'status' => '0',
              'name' => '提交编辑',
              'icon' => '',
              'remark' => '',
              'listorder' => '0',
            ),
          ),
        ),
        array (
          'app' => 'Admin',
          'model' => 'Link',
          'action' => 'add',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '添加友情链接',
          'icon' => '',
          'remark' => '',
          'listorder' => '1000',
          'children' => 
          array (
            array (
              'app' => 'Admin',
              'model' => 'Link',
              'action' => 'add_post',
              'data' => '',
              'type' => '1',
              'status' => '0',
              'name' => '提交添加',
              'icon' => '',
              'remark' => '',
              'listorder' => '0',
            ),
          ),
        ),
      ),
    ),
    array (
      'app' => 'Api',
      'model' => 'Oauthadmin',
      'action' => 'setting',
      'data' => '',
      'type' => '1',
      'status' => '1',
      'name' => '第三方登陆',
      'icon' => 'leaf',
      'remark' => '',
      'listorder' => '4',
      'children' => 
      array (
        array (
          'app' => 'Api',
          'model' => 'Oauthadmin',
          'action' => 'setting_post',
          'data' => '',
          'type' => '1',
          'status' => '0',
          'name' => '提交设置',
          'icon' => '',
          'remark' => '',
          'listorder' => '0',
        ),
      ),
    ),
  ),
);