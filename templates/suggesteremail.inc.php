<?php

$emailHeader = [
	'from'    => 'schlockoktoberfest<mailgun@'.$domain . '>', 
	'to'      => "<". $moviesuggest['email'].">", 
	'subject' => 'Thanks for suggesting the movie ' .$moviesuggest['title'], 
	'text'    => 'Thanks for suggesting the movie ' .$moviesuggest['title']. '. It would turn up in the website soon!'
];


?>

Hi there,

Thank You for your kind suggestion that we show <?php echo $moviesuggest['title'];?> at Schlockoktoberfest.

<?php if ($moviesuggest['checkbox']):?>
Thank You for subscribing for our Newsletter.
You will receive your copy within a fortnight.
<?php endif; ?>

Thanks. The Schlockoktoberfest Team.