{{-- This file is used for menu items by any Backpack v6 theme --}}

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
@if(backpack_user() && backpack_user()->hasRole('Gerente'))
    <x-backpack::menu-item title="Funcionarios" icon="la la-question" :link="backpack_url('funcionarios')" />
    <x-backpack::menu-item title="Horas trabalhadas" icon="la la-question" :link="backpack_url('horas-trabalhada')" />
    <x-backpack::menu-item title="Registro frequencias" icon="la la-question" :link="backpack_url('registro-frequencia')" />
    <x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />

    <x-backpack::menu-dropdown title="Add-ons" icon="la la-puzzle-piece">

        <x-backpack::menu-dropdown-header title="Authentication" />
        <x-backpack::menu-dropdown-item title="Users" icon="la la-user" :link="backpack_url('user')" />
        <x-backpack::menu-dropdown-item title="Roles" icon="la la-group" :link="backpack_url('role')" />
        <x-backpack::menu-dropdown-item title="Permissions" icon="la la-key" :link="backpack_url('permission')" />

    </x-backpack::menu-dropdown>
@endif

@if(backpack_user() && backpack_user()->hasRole('Gerente') || backpack_user()->hasRole('Supervisor2'))
<x-backpack::menu-item title="Estoques" icon="la la-question" :link="backpack_url('estoque')" />
<x-backpack::menu-item title="Vendas" icon="la la-question" :link="backpack_url('venda')" />
<x-backpack::menu-item title="Itens vendas" icon="la la-question" :link="backpack_url('itens-venda')" />
<x-backpack::menu-item title="Produtos" icon="la la-question" :link="backpack_url('produto')"/>

@endif
@if(backpack_user() && backpack_user()->hasRole('Gerente') || backpack_user()->hasRole('Supervisor1'))
<x-backpack::menu-item title="Fornecedores" icon="la la-question" :link="backpack_url('fornecedores')"/>
@endif

