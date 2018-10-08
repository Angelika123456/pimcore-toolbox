<?php

namespace DachcomBundle\Test\Functional;

use DachcomBundle\Test\FunctionalTester;

class AdminColumnAdjusterControllerCest
{
    /**
     * @param FunctionalTester $I
     */
    public function testToolboxColumnInfoWithoutCustomInfo(FunctionalTester $I)
    {
        $I->haveAUser('dachcom_test');
        $I->amLoggedInAs('dachcom_test');

        $params = [
            'currentColumn'             => 'column_4_4_4',
            'customColumnConfiguration' => false
        ];

        $I->amOnPage(sprintf('/admin/toolbox-get-column-info?%s', http_build_query($params)));

        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($this->getSimpleColumnInfoReturnExpectation());

    }

    /**
     * @param FunctionalTester $I
     */
    public function testToolboxColumnInfoWithCustomInfo(FunctionalTester $I)
    {
        $I->haveAUserWithAdminRights('dachcom_test');
        $I->amLoggedInAs('dachcom_test');

        $params = [
            'currentColumn'             => 'column_4_4_4',
            'customColumnConfiguration' => json_encode(
                [
                    'breakpoints' => [
                        'xs' => '12_12_12',
                        'md' => '2_2_8',
                        'lg' => '8_2_2'
                    ]
                ])
        ];

        $I->amOnPage(sprintf('/admin/toolbox-get-column-info?%s', http_build_query($params)));

        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($this->getExpectedCustomInfoColumnReturnExpectation());
    }

    /**
     * @param FunctionalTester $I
     */
    public function testToolboxColumnInfoWithCustomInfoWithPostRequest(FunctionalTester $I)
    {
        $I->haveAUserWithAdminRights('dachcom_test');
        $I->amLoggedInAs('dachcom_test');

        $params = [
            'currentColumn'             => 'column_4_4_4',
            'customColumnConfiguration' => json_encode(
                [
                    'breakpoints' => [
                        'xs' => '12_12_12',
                        'md' => '2_2_8',
                        'lg' => '8_2_2'
                    ]
                ])
        ];

        $I->sendTokenAjaxPostRequest('/admin/toolbox-get-column-info', $params);

        $I->seeResponseIsJson();
        $I->seeResponseContainsJson($this->getExpectedCustomInfoColumnReturnExpectation());

    }

    /**
     * @return array
     */
    protected function getSimpleColumnInfoReturnExpectation()
    {
        return [
            'breakPoints' =>
                [
                    0 =>
                        [
                            'identifier'  => 'xs',
                            'name'        => 'Breakpoint: XS',
                            'description' => 'Your Description',
                            'grid'        =>
                                [
                                    0 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => 12,
                                        ],
                                    1 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => 12,
                                        ],
                                    2 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => 12,
                                        ],
                                ],
                        ],
                    1 =>
                        [
                            'identifier'  => 'sm',
                            'name'        => 'Breakpoint: SM',
                            'description' => 'Your Description',
                            'grid'        =>
                                [
                                    0 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => 4,
                                        ],
                                    1 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => 4,
                                        ],
                                    2 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => 4,
                                        ],
                                ],
                        ],
                    2 =>
                        [
                            'identifier'  => 'md',
                            'name'        => 'Breakpoint: MD',
                            'description' => 'Your Description',
                            'grid'        =>
                                [
                                    0 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => null,
                                        ],
                                    1 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => null,
                                        ],
                                    2 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => null,
                                        ],
                                ],
                        ],
                    3 =>
                        [
                            'identifier'  => 'lg',
                            'name'        => 'Breakpoint: LG',
                            'description' => 'Your Description',
                            'grid'        =>
                                [
                                    0 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => null,
                                        ],
                                    1 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => null,
                                        ],
                                    2 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => null,
                                        ],
                                ],
                        ],
                ],
        ];
    }

    /**
     * @return array
     */
    protected function getExpectedCustomInfoColumnReturnExpectation()
    {
        return [
            'breakPoints' =>
                [
                    0 =>
                        [
                            'identifier'  => 'xs',
                            'name'        => 'Breakpoint: XS',
                            'description' => 'Your Description',
                            'grid'        =>
                                [
                                    0 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => 12,
                                        ],
                                    1 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => 12,
                                        ],
                                    2 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => 12,
                                        ],
                                ],
                        ],
                    1 =>
                        [
                            'identifier'  => 'sm',
                            'name'        => 'Breakpoint: SM',
                            'description' => 'Your Description',
                            'grid'        =>
                                [
                                    0 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => null,
                                        ],
                                    1 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => null,
                                        ],
                                    2 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => null,
                                        ],
                                ],
                        ],
                    2 =>
                        [
                            'identifier'  => 'md',
                            'name'        => 'Breakpoint: MD',
                            'description' => 'Your Description',
                            'grid'        =>
                                [
                                    0 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => 2,
                                        ],
                                    1 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => 2,
                                        ],
                                    2 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => 8,
                                        ],
                                ],
                        ],
                    3 =>
                        [
                            'identifier'  => 'lg',
                            'name'        => 'Breakpoint: LG',
                            'description' => 'Your Description',
                            'grid'        =>
                                [
                                    0 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => 8,
                                        ],
                                    1 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => 2,
                                        ],
                                    2 =>
                                        [
                                            'amount' => 12,
                                            'offset' => null,
                                            'value'  => 2,
                                        ],
                                ],
                        ],
                ],
        ];
    }
}

