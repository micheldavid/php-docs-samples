<?php
/**
 * Copyright 2016 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * For instructions on how to run the full sample:
 *
 * @see https://github.com/GoogleCloudPlatform/php-docs-samples/tree/master/storage/api/README.md
 */

namespace Google\Cloud\Samples\Storage;

# [START add_object_acl]
use Google\Cloud\Storage\StorageClient;

/**
 * Add an entity and role to an object's ACL.
 *
 * @param string $bucketName the name of your Cloud Storage bucket.
 * @param string $objectName the name of your Cloud Storage object.
 * @param string $entity The entity to update access controls for.
 * @param string $role The permissions to add for the specified entity. May
 *        be one of 'OWNER', 'READER', or 'WRITER'.
 * @param array $options
 *
 * @return void
 */
function add_object_acl($bucketName, $objectName, $entity, $role, $options = [])
{
    $storage = new StorageClient();
    $bucket = $storage->bucket($bucketName);
    $object = $bucket->object($objectName);
    $acl = $object->acl();
    $acl->add($entity, $role, $options);
    printf('Added %s (%s) to gs://%s/%s ACL' . PHP_EOL, $entity, $role, $bucketName, $objectName);
}
# [END add_object_acl]
