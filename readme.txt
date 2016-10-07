6.2 更新内容及安装更新方法

1 修正上6.1版本首页标题不显示的问题

2 详情页面的关键词和内容摘要可自由填写。如果不填写则默认为标签加上系统设置里面的内容和标题加系统设置里面的内容。

3 修改服务器文件存放方式。文件将按照上传日期存放在根目录下的uploads文件夹下的 year/month/day 里面。

4 伪静态后缀自由选择。设置方式为：root/config/config.php 第60行：
  $config['url_suffix'] = '.html'; 这样的设置会生产 http://wen.hbdx.cc/view/1.html 这样的路径
  $config['url_suffix'] = '.php';  这样的设置会生产 http://wen.hbdx.cc/view/1.php  这样的路径
  $config['url_suffix'] = '';      这样的设置会生产 http://wen.hbdx.cc/view/1      这样的路径

5 搜索框的回车响应事件。输入关键字后回车即可搜索，与单击搜索按钮功能一样。

6 便签检索功能修改为单一检索方式。原来的方式是叠加。叠加的方式可以实现的功能是通过多个标签来定位资源。但是好像很多人不理解这种方式。

7 加入积分功能。在发布资源的时候可以设置下载此资源需要的积分。不设置默认为0。积分为0表示免费，游客可以直接下载免费资源。非免费得资源需要登录才可以下载。下载时，下载者扣除积分，发布者增加积分。对应新注册的用户，会有一定的初始积分。初始积分有管理员在系统设置中设置。可有积分小于下载积分时不能下载。

8 详情页面加入百度分享插件。百度分享插件，大家可以去了解下，然后有什么好的建议可以提一下。

9 新增音乐试听功能。这个页面会读取所以后缀为mp3的记录。随机播放。播放器使用了HTML5的audio标签，所以不支持audio标签和不支持mp3格式的浏览器将无法使用。

10 新增个人中心功能。个人中心将展示用户最新发布的资源、最新收藏的资源、最近浏览的资源。最大展示条数为30。

11 新增浏览次数的统计。会和下载次数显示在一起。

12 新增下载记录统计。这个没有反应在前台。在积分功能中有使用到。已经下载过的资源再次下载不会再次扣除积分和增加积分。

13 重写注册模块的后台实现。

后续发展：

最近几个月我都在折腾Bootstrap(css框架)，因为我想用Bootstrap重写Simple down的前台。

这期间用Bootstrap折腾了几个小程序，当做练手。现在基础的使用已经没有问题了。

下面的计划就是用Bootstrap重写前台。这样做的好处是可以做出更好看的UI，更标准化利于后续发展，兼容性更好，更重要的是为实现在其他终端上的完美显示。

这一次有人提出广告位的问题，我也考虑了一下。其实这个涉及到的工作主要是在前台，所以这一次暂时没有做，等到前台重写后会做的。

还有一个功能就是审核功能。我觉得这个功能很有必要。下个版本会加上。


附言：

另外我想说一下关于伪静态的问题。我对于这个也没有什么研究。
只知道不同的web服务器有不同的设置方法。完美常见的web服务器有Apache IIS Nginx等。
所以你要按照Simple down需要先把伪静态设置好。
Simple down基于CodeIgniter PHP框架，你们可以去CodeIgniter得论坛找一下。
有安装成功的同学请跟我分享一下这方面的经验，我好提供给其他遇到问题的人参考下。
我直接使用的Linux的VPS，安装的是LNMP的集成环境。在新建主机的时候直接选择了WordPress的伪静态规则就可以了。

请使用Simple Down建站，并且有一点数据库的站长和我联系。我可以在加你们链接。也方便其他新用户借鉴和学习。


Simple Down v6.1安装方法

注意：本程序需要伪静态的支持。

全新安装：
    
    1 安装数据库。创建一个新的数据库，然后导入 dist/simple.sql 。
      默认管理员账户：admin 密码：123456。

    2 设置数据库信息。在 root/config/database.php 中：
      $db['default']['hostname'] = 'localhost';  //服务器地址
      $db['default']['username'] = '';           //MYSQL 用户名
      $db['default']['password'] = '';           //MYSQL 密码
      $db['default']['database'] = '';           //数据库名称

    3 网站基础设置。在 root/config/config.php 中：
      $config['base_url']	= '';  //网站地址 正确格式：http://yourweb.com/
      $config['url_suffix'] = '';  //伪静态地址后缀 正确格式: .html .php .htm 或者为空

    4 上传所有文件到服务器。

升级：

    升级前请先备份你的数据库。

    这一次我将数据库的表名和字段名全部修改为小写。新增一个下载记录表和几个字段。

    1 修改表名为小写。可以使用这样的SQL语句：

      rename table HBDX_BASEINFO to hbdx_baseinfo;

    2 修改字段名为小写。这个可以手动修改。使用SQL语句修改的方法暂时没有找到统一的。

    3 新增字段。打开 dist/simple.sql 和你现在的数据库对比一下，你会发现这几个字段是新增的。

      类型和长度参考 dist/simple.sql 中的设置。

      表[hbdx_blue] 新增字段 [keywords] [description] [viewnum] [integration] 

      表[hbdx_users] 新增字段 [user_integration] [lastview] 

    4 新增下载记录表hbdx_downrecord

      在SQL中执行如下语句：

      CREATE TABLE IF NOT EXISTS `hbdx_downrecord` (
        `id` int(11) unsigned NOT NULL auto_increment,
        `record_id` int(11) NOT NULL,
        `user_name` varchar(60) NOT NULL,
        PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

    5 插入新的系统设置信息

      INSERT INTO `hbdx_baseinfo` (`tagfirst`, `tagsecond`, `code`) VALUES ('SHOW', '积分', 'TRUE');

      INSERT INTO `hbdx_baseinfo` (`tagfirst`, `tagsecond`, `code`) VALUES ('SYSTEMINFO', 'INTEGRATION', '10');

      数据库修改完成。

      删除网站目录下uploads之外的所以文件。上传新的问题。再按照上面的全新安装的方法配置一下数据库和网站基础信息就可以了。

遗留问题：

      批量发布的中文BUG我还没能找到最好的解决办法。现在有一个问题就是文件名的第一个字符不能是中文，否则得不到文件名。

      例如：海兵大侠.zip 这个文件你使用批量发布标题和文件名会变成空。修改一下名字：[文档].海兵大侠.zip 就可以了，因为第一个字符不是中文了。

程序演示:http://d.hbdx.cc/
作者主页:http://hbdx.cc/
联系作者:QQ 416509859
讨论群  :282494719



