                        
                            @foreach($projects as $project)

                                <tr>
                                    
                                   <td>
                                    {{ $category->header }}
                                   </td>
                                   <td></td>
                                   <td></td>

                                    @if(count($category->childs))

                                        @include('projectcontent.partials.childs',['childs' => $projects->childs])

                                    @endif

                                </tr>

                            @endforeach