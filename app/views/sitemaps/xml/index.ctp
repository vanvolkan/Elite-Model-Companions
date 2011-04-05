<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
         xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
         xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"> 
      <url> 
        <loc><?php echo Router::url('/', true); ?></loc> 
        <lastmod><?php echo trim($time->toAtom(time())); ?></lastmod> 
        <changefreq>weekly</changefreq> 
        <priority>1.0</priority> 
    </url> 
<?php 
if( isset($statics) && !empty($statics) ): 
    foreach ($statics as $static):?> 
    <url>  
        <loc><?php echo Router::url($static['url'], true); ?></loc>  
        <lastmod><?php echo trim($time->toAtom(time())); ?></lastmod> 
        <priority><?php echo $static['options']['pr'] ?></priority> 
        <changefreq><?php echo $static['options']['changefreq'] ?></changefreq> 
    </url> 
<?php 
    endforeach; 
endif; 

if( isset($dynamics) && !empty($dynamics) ): 
    foreach ($dynamics as $dynamic):?>  
    <url>  
        <loc><?php echo Router::url(array( 
                                          'controller' => $dynamic['options']['url']['controller'],  
                                          'action' => $dynamic['options']['url']['index'] 
                                          ), true); ?></loc>  
        <lastmod><?php echo trim($time->toAtom(time())); ?></lastmod> 
        <priority><?php echo $dynamic['options']['pr'] ?></priority> 
        <changefreq><?php echo $dynamic['options']['changefreq'] ?></changefreq> 
    </url> 
    <?php foreach ($dynamic['data'] as $section):?>  
    <url>  
        <loc><?php echo Router::url(array( 
                                          'controller' => $dynamic['options']['url']['controller'],  
                                          'action' => $dynamic['options']['url']['action'],  
                                          $section[$dynamic['model']][$dynamic['options']['fields']['id']] 
                                          ), true); ?></loc>  
        <lastmod><?php echo trim($time->toAtom($section[$dynamic['model']][$dynamic['options']['fields']['date']]))?></lastmod>  
        <priority><?php echo $dynamic['options']['pr'] ?></priority>  
        <changefreq><?php echo $dynamic['options']['changefreq'] ?></changefreq> 
    </url>  
    <?php endforeach; 
    endforeach; 
endif; ?>  
</urlset>