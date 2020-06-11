<?php

$message = sprintf(
    'Hello %s',
    htmlspecialchars($request->get('name', 'World'))
);

$response->setContent($message);
