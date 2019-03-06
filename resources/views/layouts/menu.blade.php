<li class="{{ Request::is('itemTypes*') ? 'active' : '' }}">
    <a href="{!! route('itemTypes.index') !!}"><i class="fa fa-edit"></i><span>Item Types</span></a>
</li>

<li class="{{ Request::is('items*') ? 'active' : '' }}">
    <a href="{!! route('items.index') !!}"><i class="fa fa-edit"></i><span>Items</span></a>
</li>

