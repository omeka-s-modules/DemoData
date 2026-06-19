<?php
namespace DemoData;

use Laminas\Router\Http;

return [
    'demo_data' => [
        'datasets' => [
            'artworks' => [
                'label' => 'Artworks',
                'description' => 'Paintings, sculptures, works on paper, and manuscripts spanning art movements from antiquity to the present.',
                'item_count' => 200,
                'set_count' => 5,
            ],
            'civilizations' => [
                'label' => 'Civilizations',
                'description' => 'Historical civilizations, empires, dynasties, and cultural periods from across the ancient, medieval, and early modern world.',
                'item_count' => 450,
                'set_count' => 10,
            ],
            'documents' => [
                'label' => 'Documents',
                'description' => 'Historical handwritten and typed documents including letters, diaries, newspapers, and official records.',
                'item_count' => 50,
                'set_count' => 6,
            ],
            'people' => [
                'label' => 'People',
                'description' => 'Historical figures spanning science, literature, philosophy, exploration, and political leadership across cultures and centuries.',
                'item_count' => 100,
                'set_count' => 5,
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            sprintf('%s/../view', __DIR__),
        ],
    ],
    'controllers' => [
        'factories' => [
            'DemoData\Controller\Admin\Index' => Service\Controller\IndexControllerFactory::class,
        ],
    ],
    'navigation' => [
        'AdminModule' => [
            [
                'label' => 'Demo Data',
                'route' => 'admin/demo-data',
                'controller' => 'Index',
                'action' => 'index',
                'resource' => 'DemoData\Controller\Admin\Index',
                'useRouteMatch' => true,
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'admin' => [
                'child_routes' => [
                    'demo-data' => [
                        'type' => Http\Literal::class,
                        'options' => [
                            'route' => '/demo-data',
                            'defaults' => [
                                '__NAMESPACE__' => 'DemoData\Controller\Admin',
                                'controller' => 'Index',
                                'action' => 'index',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
