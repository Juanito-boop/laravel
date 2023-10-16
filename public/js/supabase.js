import { createClient } from '@supabase/supabase-js'

const apikey = process.env.APIKEY;
const idproject = process.env.ID_PROJECT;

const supabaselient=createClient(`https://${idproject}.supabase.co`,apikey);

console.log(supabaselient);
