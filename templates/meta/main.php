<meta charset="UTF-8">
<meta name="description" content="<?= seo_escape(seo_description($meta_desc)); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="p:domain_verify" content="de0be4f5a7cf46b1fb6578af011e6998">
<meta name="robots" content="<?= !empty($noindex) ? 'noindex,follow' : 'index,follow'; ?>">
<?php if (empty($noindex)): ?>
<link rel="canonical" href="<?= seo_escape(seo_url($canonical_path)); ?>">
<meta property="og:url" content="<?= seo_escape(seo_url($canonical_path)); ?>">
<?php endif; ?>
<meta property="og:type" content="website">
<meta property="og:site_name" content="Ebitenyefa Baralaye">
<meta property="og:title" content="<?= seo_escape(seo_text($title)); ?>">
<meta property="og:description" content="<?= seo_escape(seo_description($meta_desc)); ?>">
<?php if (!empty($og_image)): ?>
<meta property="og:image" content="<?= seo_escape(seo_url($og_image)); ?>">
<?php endif; ?>
