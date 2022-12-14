<?php

namespace Njeaner\Symfrop\Core\Service;

use Njeaner\Symfrop\Exceptions\NotFoundClassException;

/**
 * @author Jean Fils de Ntouoka 2 <nguimjeaner@gmail.com>
 * @version 1.0.0
 */
class Config
{
    /**
     * @var string
     */
    private readonly string $userEntity;

    /**
     * @var string
     */
    private readonly string $roleEntity;

    /**
     * @var string
     */
    private readonly string $actionEntity;

    /**
     * @var string
     */
    private readonly string $userRoleForm;

    /**
     * @var string
     */
    private readonly string $roleForm;

    /**
     * @var string
     */
    private readonly string $actionForm;

    private readonly array $roles;

    private readonly ?string $navbarTop;

    private readonly ?string $navbarBottom;

    private readonly ?array $stylesheets;

    private readonly ?array $scripts;

    private array $resources;

    /**
     * @var Config
     */
    private static Config $instance;

    public function __construct(private array $config)
    {
        $this->resources = $config['resources_info'];
        $this->userEntity = $config['entities']['entity']['user_entity'];
        $this->roleEntity = $config['entities']['entity']['role_entity'];
        $this->actionEntity = $config['entities']['entity']['action_entity'];
        $this->userRoleForm = $config['entities']['form']['user_role_form'];
        $this->roleForm = $config['entities']['form']['role_form'];
        $this->actionForm = $config['entities']['form']['action_form'];
        $this->roles = $config['app_roles'];
        $this->navbarTop = $config['templates']['navbar_top'] ?? null;
        $this->navbarBottom = $config['templates']['navbar_bottom'] ?? null;
        $this->stylesheets = $config['templates']['stylesheets'] ?? null;
        $this->scripts = $config['templates']['scripts'] ?? null;
        self::$instance = $this;
    }

    /**
     * Get the value of userEntity
     */
    public function getUserEntity(): string
    {
        return $this->userEntity;
    }

    /**
     * Get the value of roleEntity
     */
    public function getRoleEntity(): string
    {
        return $this->roleEntity;
    }

    /**
     * Get the value of actionEntity
     */
    public function getActionEntity(): string
    {
        return $this->actionEntity;
    }

    /**
     * Get the value of instance
     */
    public static function getInstance(): self
    {
        return self::$instance ?? throw new NotFoundClassException(__CLASS__ . ' is not yet instanciate');
    }

    /**
     * Get the value of userRoleForm
     *
     * @return  string
     */
    public function getUserRoleForm(): string
    {
        return $this->userRoleForm;
    }

    /**
     * Get the value of roleForm
     *
     * @return  string
     */
    public function getRoleForm(): string
    {
        return $this->roleForm;
    }

    /**
     * Get the value of actionForm
     *
     * @return  string
     */
    public function getActionForm(): string
    {
        return $this->actionForm;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getNavbarTop(): ?string
    {
        return $this->navbarTop;
    }

    public function getNavbarBottom(): ?string
    {
        return $this->navbarBottom;
    }

    public function getStylesheets(): ?array
    {
        return $this->stylesheets;
    }

    public function getScripts(): ?array
    {
        return $this->scripts;
    }

    public function getAll(): array
    {
        return $this->config;
    }

    public function getResources(): array
    {
        return $this->resources;
    }
}
