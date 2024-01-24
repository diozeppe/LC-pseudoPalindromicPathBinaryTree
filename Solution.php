/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function pseudoPalindromicPaths($root) {
        $count = 0;
        $path = [];
        $ocor = [];

        $this->run($root, $count, $path, $ocor);
        return $count;
    }

    function run(TreeNode &$t, &$count, &$path, &$ocor) {
        $path[] = $t->val;
        $ocor[$t->val] = $ocor[$t->val]+1??1;
        
        if (is_null($t->left) && is_null($t->right)) {
            if ($this->isPseudoPalindrome($ocor)) {
                $count++;
            }
        } else {
            if (!is_null($t->left)) {
                $this->run($t->left, $count, $path, $ocor);
            }
        
            if (!is_null($t->right)) {
                $this->run($t->right, $count, $path, $ocor);
           }
        }

        array_pop($path);
        $ocor[$t->val] = $ocor[$t->val]-1??0;
    }

    function isPseudoPalindrome(&$ocor){
        $count = 0;
        foreach($ocor as $v){
            if ($v % 2 > 0) {
                $count++;

                if ($count > 1) {
                    return false;
                }
            }
        }
        return true;
    }
}
