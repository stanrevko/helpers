<?php

namespace successus/helpers
{
    Class Proxy
    {
        protected $realObject = null;
        protected $cache = null;
        protected $ttl = 0;

        public function  __construct( $object, $ttl = 60 )
        {
            $this->realObject = $object;

            // для примера, сделаем по-простому 
            // без инверсий зависимости
            $this->cache = new Cache;

            $this->ttl = $ttl;
        }


        // для перехвата вызовов несуществующих методов прокси
        // и трансляции их реальному объекту
        // используем магический метод __call() 
        public function  __call( $method, $args )
        {
            $cacheKey = $method . '(' . \serialize($args) . ')';

            $data = $this->cache->get( $cacheKey );

            if ( null === $data ) {
                $call = array( $this->realObject, $method );
                $data = \call_user_func_array( $call, $args );
                $this->cache->set( $cacheKey, $data, $this->ttl );
            }

            return $data;
        }
    }
}
?>
